@section('js')
    <script>
        const route = @json(route('staff.datatables.borrowed-asset'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#asset').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
                ajax: {
                    url: route,
                },
                columns: [{
                        data: 'asset.image', // Đặt tên cột chứa đường dẫn ảnh
                        render: function(data, type, row) {
                            const avatarHtml =
                                `<div class="d-flex justify-content-center"">
                                <div class="bg-white d-flex justify-content-center rounded-circle p-1">
                                <img class="rounded-circle" alt="No image" src="{{ asset('storage/uploads') }}/${data}" width="40px" heigth="40px">
                                </div>
                            </div>`;
                            return avatarHtml;
                        }
                    },
                    {
                        data: 'asset.name',
                        name: 'asset.name'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'room.name',
                        name: 'room.name',
                    },

                    {
                        render: function(data, type, row) {
                            if (row.status == 1) {
                                return '<span class="badge badge-success">Đang sử dụng</span>'
                            } else {
                                return '<span class="badge badge-danger">Đã thanh lý</span>'
                            }
                        }
                    },
                    {
                        render: function(data, type, row) {

                            var del = row.delete_url;
                            var buttonDelete = '<form action="' + del +
                                '" method="POST" style="display:inline;">' +
                                '@CSRF' +
                                '@method('DELETE')' +
                                '<button class="btn btn-danger" type="submit" onclick="return confirm(\'Bạn có chắc chắn ngừng hoạt động danh mục tài sản này?\')">' +
                                '<i class="fa fa-trash"></i></button></form>';
                            return buttonDelete
                        }
                    }
                ]
            })
        })
    </script>
@endsection
