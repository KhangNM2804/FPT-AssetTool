@section('js')
    <script>
        var j = jQuery.noConflict(true);

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    j('.image-upload-wrap').hide();
                    j('.file-upload-image').attr('src', e.target.result);
                    j('.file-upload-content').show();
                    j('.image-title').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            j('.file-upload-input').replaceWith(j('.file-upload-input').clone());
            j('.file-upload-content').hide();
            j('.image-upload-wrap').show();
            j('#asset').DataTable().clear().destroy();
            // Tái khởi tạo sự kiện change
            j('#excelFile').off('change').on('change', function(e) {
                readURL(this);
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var data = new Uint8Array(e.target.result);
                        var workbook = XLSX.read(data, {
                            type: 'array'
                        });
                        var sheetName = workbook.SheetNames[0];
                        var sheet = workbook.Sheets[sheetName];
                        var jsonData = XLSX.utils.sheet_to_json(sheet, {
                            header: 1
                        });
                        var headers = jsonData[0];
                        var data = jsonData.slice(1);

                        // Clear DataTable before adding new data
                        j('#asset').DataTable().clear().destroy();

                        // Populate DataTable with new data
                        j('#asset').DataTable({
                            data: data,
                            columns: headers.map(function(header) {
                                return {
                                    title: header
                                };
                            })
                        });
                    };
                    reader.readAsArrayBuffer(file);
                }
            });
        }


        j(document).ready(function() {
            //Trigger khi thay đổi file input
            j('.file-upload-input').on('change', function() {
                readURL(this);
            });

            // Xóa hình ảnh khi nhấn nút xóa
            j('#remove_file').on('click', function() {
                removeUpload();
            });
            j('#import').on('click', function() {
                const route = @json(route('staff.asset.asset.importFile'));
                var fileInput = document.getElementById('excelFile');
                var file = fileInput.files[0]; // Lấy ra tệp tin đã chọn
                var formData = new FormData(); // Tạo đối tượng FormData
                formData.append('file', file); // Đính kèm tệp tin vào FormData với key 'excel_file'
                j.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: route,
                    method: 'POST',
                    contentType: false, // Không đặt contentType
                    processData: false,
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Đã nhập dữ liệu từ file thành công",
                            icon: "success",

                            confirmButtonText: "Xác nhận",

                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Nếu người dùng xác nhận, chuyển hướng đến route
                                window.location.href = @json(route('staff.asset.asset.index'));
                            } else {
                                window.location.href = @json(route('staff.asset.asset.index'));
                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Thất bại!",
                            text: "Nhập dữ liệu thất bại",
                            icon: "error"
                        });
                    }
                });
            })
            j('.image-upload-wrap').bind('dragover', function() {
                j('.image-upload-wrap').addClass('image-dropping');
            });
            j('.image-upload-wrap').bind('dragleave', function() {
                j('.image-upload-wrap').removeClass('image-dropping');
            });
            j('#excelFile').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var data = new Uint8Array(e.target.result);
                        var workbook = XLSX.read(data, {
                            type: 'array'
                        });
                        var sheetName = workbook.SheetNames[0];
                        var sheet = workbook.Sheets[sheetName];
                        var jsonData = XLSX.utils.sheet_to_json(sheet, {
                            header: 1
                        });
                        var headers = jsonData[0];
                        var data = jsonData.slice(1);

                        // Clear DataTable before adding new data
                        j('#asset').DataTable().clear().destroy();

                        // Populate DataTable with new data
                        j('#asset').DataTable({
                            scrollX: true,
                            data: data,
                            columns: headers.map(function(header) {
                                return {
                                    title: header
                                };
                            })
                        });
                    };
                    reader.readAsArrayBuffer(file);
                }
            });
        });
    </script>
@endsection
