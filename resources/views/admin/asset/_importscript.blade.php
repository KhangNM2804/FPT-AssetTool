@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();
                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-content').show();
                    $('.image-title').html(input.files[0].name);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
            $('#asset').DataTable().clear().destroy();
            // Tái khởi tạo sự kiện change
            $('#excelFile').off('change').on('change', function(e) {
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
                        $('#asset').DataTable().clear().destroy();

                        // Populate DataTable with new data
                        $('#asset').DataTable({
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


        $(document).ready(function() {
            //Trigger khi thay đổi file input
            $('.file-upload-input').on('change', function() {
                readURL(this);
            });

            // Xóa hình ảnh khi nhấn nút xóa
            $('.remove-image').on('click', function() {
                removeUpload();
            });
            $('.image-upload-wrap').bind('dragover', function() {
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function() {
                $('.image-upload-wrap').removeClass('image-dropping');
            });
            $('#excelFile').on('change', function(e) {
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
                        $('#asset').DataTable().clear().destroy();

                        // Populate DataTable with new data
                        $('#asset').DataTable({
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