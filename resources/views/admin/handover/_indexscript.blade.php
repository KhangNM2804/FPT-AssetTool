@section('js')
    <script>
        var j = jQuery.noConflict(true);
        const route = @json(route('staff.search.rooms'));
        const routeHandover = @json(route('staff.asset.handover.save'));
        j(document).ready(function() {
            j('#handover').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
            });
            j('#selectAll').change(function() {
                j('.selectCheckbox').prop('checked', this.checked);
            });

            // Xử lý sự kiện khi checkbox hàng được chọn hoặc bỏ chọn
            j('.selectCheckbox').change(function() {
                if (j('.selectCheckbox:checked').length == j('.selectCheckbox').length) {
                    j('#selectAll').prop('checked', true);
                } else {
                    j('#selectAll').prop('checked', false);
                }
            });
            j('#submit-button').on('click', function() {
                var selectedCheckboxes = j('.selectCheckbox:checked');

                // Lưu trữ các giá trị ID của các hàng đã chọn
                var selectedIds = [];
                selectedCheckboxes.each(function() {
                    var rowId = j(this).closest('tr').find('td:eq(1)').text();
                    selectedIds.push(rowId);
                });
                Swal.fire({
                    title: 'Select an option',
                    html: '<select id="select-rooms" class="swal2-select" style="width:350px">' +
                        '<option value="">Chọn vị trí bàn giao</option>' +
                        '</select>',
                    showCancelButton: true,
                    onOpen: () => {
                        j('#select-rooms').select2({
                            ajax: {
                                url: route,
                                dataType: 'json',
                                delay: 250,
                                data: function(params) {
                                    return {
                                        term: params.term,
                                    }
                                },
                                processResults: function(data) {
                                    return {
                                        results: j.map(data, function(item) {
                                            return {
                                                text: item.name + ' - ' +
                                                    item.manager.name,
                                                id: item.id,
                                            }
                                        })
                                    }
                                },
                                cache: true,
                                minimumInputLength: 0,
                                maximumInputLength: 20,

                            }
                        });
                    },
                    preConfirm: () => {
                        return j('#select-rooms').val()
                    }

                }).then((result) => {
                    if (result.isConfirmed) {
                        const selectedValue = document.getElementById('select-rooms').value;
                        console.log('Selected value:', selectedValue);
                        return j.ajax({
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            url: routeHandover,
                            method: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify({
                                room_id: selectedValue,
                                details: selectedIds
                            }),
                            success: function(data) {
                                Swal.fire({
                                    title: "Bàn giao thành công",
                                    text: "Bạn có muốn tải biên bản bàn giao không ?",
                                    icon: "question",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Tải xuống"
                                }).then(async (result) => {
                                    if (result.isConfirmed) {
                                        // Lấy đường dẫn tệp Excel từ session
                                        var excelUrl =
                                            "{{ session('excel_url') }}";
                                        const link = document.createElement(
                                            "a");
                                        link.href = excelUrl;
                                        link.download =
                                            "bien_ban_ban_giao_2.xlsx";
                                        // Thêm thẻ <a> vào trang và tự động kích hoạt sự kiện click để tải tệp Excel
                                        document.body.appendChild(link);
                                        link.click();
                                        document.body.removeChild(link);

                                        Swal.fire({
                                            title: "Đang tải xuống",
                                            text: "Vui lòng đợi...",
                                            icon: "info",
                                            showConfirmButton: false, // Ẩn nút Xác nhận
                                            allowOutsideClick: false // Không cho phép click bên ngoài hộp thoại
                                        });


                                        // Sau khi tệp Excel đã được tải xuống, hiển thị thông báo thành công và tiếp tục
                                        Swal.fire({
                                            title: "Thành công!",
                                            text: "Đã tải xuống biên bản bàn giao",
                                            icon: "success"
                                        }).then((result) => {
                                            if (result
                                                .isConfirmed) {
                                                window.location
                                                    .reload();
                                            } else {
                                                window.location
                                                    .reload();
                                            }
                                        });

                                    }
                                });
                            },
                            error: function() {
                                Swal.fire('Lỗi', 'Đã xảy ra lỗi khi thêm dữ liệu',
                                    'error');
                            }
                        });
                    }

                });
            });


        });
    </script>
@endsection
