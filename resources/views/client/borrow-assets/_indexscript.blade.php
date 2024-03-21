@section('js')
    <script>
        var items = [];
        $(document).ready(function() {

            // Xử lý sự kiện click vào nút "Thêm"
            $('#borrow-form').submit(function(event) {
                // Ngăn chặn hành vi mặc định của form (không gửi dữ liệu)
                event.preventDefault();
                const route = @json(route('client.borrow.borrows.store'));
                // Lấy giá trị của các trường nhập liệu
                var startAt = $('input[name="start_at"]').val();
                var endAt = $('input[name="end_at"]').val();
                var startDate = new Date(startAt);
                var endDate = new Date(endAt);
                var today = new Date();
                // Kiểm tra điều kiện
                if (items.length < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Bạn phải mượn ít nhất một tài sản!'
                    });
                    return
                }
                if (startDate >= endDate) {
                    // Nếu startAt không nhỏ hơn endAt, hiển thị thông báo lỗi
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Ngày mượn phải trước ngày trả!'
                    });

                    return; // Dừng lại và không gửi form đi
                }
                if (startDate < today || endDate < today) {
                    // Nếu startAt không nhỏ hơn endAt, hiển thị thông báo lỗi
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Ngày mượn và ngày trả phải sau hoặc bằng ngày hôm nay'
                    });

                    return; // Dừng lại và không gửi form đi
                }
                // Tạo một đối tượng FormData để lưu trữ dữ liệu của form
                var formData = new FormData();

                // Thêm giá trị của các trường nhập liệu vào formData
                formData.append('start_at', startAt);
                formData.append('end_at', endAt);

                // Thêm mảng items vào formData
                for (var i = 0; i < items.length; i++) {
                    formData.append('items[]', JSON.stringify(items[i]));
                }
                console.log(formData);
                // Gửi formData đến server bằng cách sử dụng AJAX
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: route,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        if (response.status == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: 'Đã đăng ký mượn tài sản! Vui lòng liên hệ Phòng Hành Chính.',
                                onClose: () => {
                                    var route = @json(route('client.borrow.borrows-client-index'));
                                    window.location.href = route;
                                }
                            });

                        } else if (response.status == 422) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Có lỗi xảy ra trong quá trình mượn'
                        });
                    }
                });
            });
            $('.btn-add').click(function() {
                // Lấy id và tên của item từ thuộc tính data
                var itemId = $(this).data('item-id');
                var itemName = $(this).data('item-name');
                var itemSum = $(this).data('item-quantity');

                // Hiển thị SweetAlert để người dùng nhập số lượng
                Swal.fire({
                    title: 'Nhập số lượng',
                    input: 'number',
                    inputLabel: 'Số lượng',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Thêm',
                    cancelButtonText: 'Hủy',
                    showLoaderOnConfirm: true,
                    preConfirm: (quantity) => {
                        // Kiểm tra xem người dùng đã nhập số lượng hay chưa
                        if (!quantity || quantity <= 0) {
                            Swal.showValidationMessage('Vui lòng nhập số lượng hợp lệ');
                        } else if (quantity > itemSum) {
                            Swal.showValidationMessage('Tài sản không có đủ số lượng bạn cần');
                        }
                        return quantity;
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    // Nếu người dùng đã nhập số lượng, thêm vào mảng
                    if (result.isConfirmed) {
                        var quantity = parseInt(result
                            .value);
                        if (!isItemIdExists(itemId)) {
                            var item = {
                                id: itemId,
                                name: itemName,
                                quantity: quantity
                            }; // Tạo đối tượng mới chứa thông tin id, tên và số lượng
                            items.push(item); // Thêm đối tượng mới vào mảng items
                            console.log(items); // In ra mảng để kiểm tra
                            addToTable(); // Thêm thông tin vào bảng từ mảng items
                        } else {
                            // Nếu ID đã tồn tại, hiển thị thông báo lỗi
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Bạn đã chọn tài sản này rồi!'
                            });
                        }
                    }
                });
            });
            $('#item-table').on('click', '.btn-remove', function() {
                // Lấy id và tên của item từ thuộc tính data
                var itemId = $(this).data('item-id');
                var index = items.findIndex(function(item) {
                    return item.id === itemId;
                });
                // Nếu tìm thấy mục, xóa nó ra khỏi mảng
                if (index !== -1) {
                    items.splice(index, 1);
                    // Cập nhật bảng sau khi xóa mục ra khỏi mảng
                    addToTable();
                }
            });

            // Hàm thêm thông tin vào bảng
            function addToTable() {
                $('#item-table tbody').empty(); // Xóa hết các hàng trong bảng trước khi thêm mới
                items.forEach(function(item, index) {
                    var newRow = '<tr class="text-center">' +
                        '<td>' + (index + 1) + '</td>' +
                        // Thay đổi cột ID thành vị trí của mục trong mảng + 1
                        '<td>' + item.name + '</td>' +
                        '<td>' + item.quantity + '</td>' +
                        '<td class="text-danger"><button data-item-id="' + item.id +
                        '" class="btn btn-sm btn-danger btn-remove"><i class="fas fa-trash-alt"></i></button></td>' +
                        '</tr>';
                    $('#item-table tbody').append(newRow);
                });
            }

            function isItemIdExists(itemId) {
                for (var i = 0; i < items.length; i++) {
                    if (items[i].id === itemId) {
                        return true;
                    }
                }
                return false;
            }
        });
    </script>
@endsection
