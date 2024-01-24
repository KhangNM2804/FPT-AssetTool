@section('js')
    <style>
        .swal2-validation-message {
            font-size: 14px;
            /* Kích thước font */
            color: red;
            /* Màu chữ */
            margin-top: 5px;
            /* Khoảng cách từ phía trên */
            background-color: rgb(43, 42, 42)
        }
    </style>
    <script>
        var j = jQuery.noConflict(true);
        const idAsset = @json($asset->id);
        const routeStore = @json(route('staff.asset.asset-detail.store'));
        const routeMerge = @json(route('staff.asset.asset-detail.merge'));
        j(document).ready(function() {
            j('#asset').DataTable({
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
            j('#mergeDetail').click(function() {
                // Lấy danh sách các checkbox đã chọn
                var selectedCheckboxes = j('.selectCheckbox:checked');

                // Lưu trữ các giá trị ID của các hàng đã chọn
                var selectedIds = [];
                selectedCheckboxes.each(function() {
                    var rowId = j(this).closest('tr').find('td:eq(1)').text();
                    selectedIds.push(rowId);
                });

                // Gửi API với danh sách ID đã chọn
                j.ajax({
                    url: routeMerge,
                    method: 'POST',
                    data: {
                        asset_id: @json($asset->id),
                        details: selectedIds
                    },
                    success: function(response) {

                        Swal.fire('Thành công', 'Tài sản đã được gộp',
                            'success');
                        j('#selectAll, .selectCheckbox').prop('checked', false);
                        location.reload();
                    },
                    error: function(error) {
                        Swal.fire('Lỗi', 'Đã xảy ra lỗi khi gộp dữ liệu',
                            'error');
                    }
                });
            });
            j('#addDetail').click(function() {
                Swal.fire({
                    title: 'Nhập số lượng cần thêm',
                    input: 'text',
                    inputAttributes: {
                        min: 1,
                        step: 1
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Thêm',
                    cancelButtonText: 'Hủy',
                    showLoaderOnConfirm: true,
                    preConfirm: function(quantity) {
                        quantity = parseInt(quantity, 10);
                        if (isNaN(quantity) || quantity <= 0) {
                            return Swal.showValidationMessage('Data is invalid');
                        }
                        return j.ajax({
                            url: routeStore,
                            method: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify({
                                quantity: quantity,
                                asset_id: idAsset
                            }),
                            success: function(data) {
                                // Xử lý dữ liệu trả về từ API nếu cần
                                Swal.fire('Thành công', 'Dữ liệu đã được thêm',
                                    'success');

                                location.reload();
                            },
                            error: function() {
                                Swal.fire('Lỗi', 'Đã xảy ra lỗi khi thêm dữ liệu',
                                    'error');
                            }
                        });
                    },
                    allowOutsideClick: function() {
                        return !Swal.isLoading();
                    }
                })
            });
            j("#splitButton").click(function(event) {
                // Ngăn chặn hành vi mặc định của nút (tức là ngăn chặn form từ việc tự động submit)
                event.preventDefault();

                Swal.fire({
                    title: 'Nhập số lượng cần tách',
                    input: 'text',
                    inputAttributes: {
                        min: 1,
                        step: 1
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Tách',
                    cancelButtonText: 'Hủy',
                    showLoaderOnConfirm: true,
                    preConfirm: function(quantity) {
                        quantity = parseInt(quantity, 10);
                        if (isNaN(quantity) || quantity <= 0) {
                            return Swal.showValidationMessage('Data is invalid');
                        }
                        j('#quantity').val(quantity)
                        j("#splitForm").submit();
                    },
                    allowOutsideClick: function() {
                        return !Swal.isLoading();
                    }
                })
                
            });
        })
    </script>
@endsection
