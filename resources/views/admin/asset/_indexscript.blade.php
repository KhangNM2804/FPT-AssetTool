@section('js')
    <script>
        const route = @json(route('staff.datatables.asset'));
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
                        data: 'image', // Đặt tên cột chứa đường dẫn ảnh
                        render: function(data, type, row) {
                            const avatarHtml =
                                `<div class="d-flex justify-content-center"">
                                    <div class="bg-white d-flex justify-content-center rounded-circle p-1">
                                    <img class="rounded-circle" alt="No image" src="{{ asset('storage/uploads') }}/${data}" width="40px" heigth="40px">
                                    </div>
                                </div>`;
                            return avatarHtml;
                        }
                    }, {
                        data: 'code',
                        name: 'code',
                        width: '100px',
                        render: function(data, type, row) {
                            return data ? data :
                                '<span class="badge badge-secondary">Không có mã</span>';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '400px'
                    },
                    {
                        data: 'invoice',
                        name: 'invoice',
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                        width: '25px'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: function(data, type, row) {
                            return numeral(data).format('0,0');
                        }
                    }, {
                        data: 'total_price',
                        name: 'total_price',
                        render: function(data, type, row) {
                            return numeral(data).format('0,0');
                        }
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
                            var edit = row.edit_url;
                            var del = row.delete_url;
                            var show = row.show_url;

                            var buttonEdit = '';
                            var buttonShow = '';
                            var buttonDelete = '';

                            if (edit != null) {
                                buttonEdit = '<a href="' + edit +
                                    '" class="btn btn-primary"><i class="fa fa-edit "></i></a>';
                            }
                            if (del != null) {
                                buttonDelete = '<form action="' + del +
                                    '" method="POST" style="display:inline;" class="">' +
                                    '@CSRF' +
                                    '@method('DELETE')' +
                                    '<button class="btn btn-danger " type="submit" onclick="return confirm(\'Bạn có chắc chắn ngừng hoạt động danh mục tài sản này?\')">' +
                                    '<i class="fa fa-trash"></i></button></form>';
                            }
                            if (show) {
                                buttonShow = '<a href="' + show +
                                    '" class="btn btn-info"><i class="fa fa-eye"></i></a>';
                            }
                            return buttonEdit + ' ' + buttonShow + ' ' + buttonDelete
                        },
                        width: '120px'
                    }
                ]
            })
        })
    </script>
@endsection
