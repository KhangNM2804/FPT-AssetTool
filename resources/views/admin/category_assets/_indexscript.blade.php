@section('js')
    <script>
        const route = @json(route('staff.datatables.category-assets'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#category_asset').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
                ajax: {
                    url: route,
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        render: function(data, type, row) {
                            if (row.status == 1) {
                                return '<span class="badge badge-success">Đang hoạt động</span>'
                            } else {
                                return '<span class="badge badge-danger">Ngừng hoạt động</span>'
                            }
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var edit = row.edit_url;
                            var del = row.delete_url;
                            var buttonEdit = '<a href="' + edit +
                                '" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                            var buttonDelete = '<form action="' + del +
                                '" method="POST" style="display:inline;">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button class="btn btn-danger" type="submit" onclick="return confirm(\'Bạn có chắc chắn ngừng hoạt động danh mục tài sản này?\')">' +
                                '<i class="fa fa-trash"></i></button></form>';
                            return buttonEdit + ' ' + buttonDelete
                        }
                    }
                ]
            })
        })
    </script>
@endsection
