@section('js')
    <script>
        const route = @json(route('staff.datatables.group-assets'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#group-asset').dataTable({
                dom: 'lifrtp',
                search: true,
                proccess: true,
                ajax: {
                    url: route
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
                                return '<span class="badge badge-success">Hoạt động</span>'
                            } else {
                                return '<span class="badge badge-danger">Ngừng hoạt động</span>'
                            }
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var edit = row.edit_url;
                            var del = row.delete_url;
                            var btnEdit =
                                '<a class="btn btn-primary" href="' + edit +
                                '"><i class="fa fa-edit"></i></a>'
                            var btnDelete = '<form action="' + del +
                                '" method="post" style="display: inline;">' + '@csrf' +
                                '@method('DELETE')' +
                                '<button class="btn btn-danger" type="submit" onclick="return confirm(\'Bạn có chắc chắn muốn ngừng hoạt động không ?\')">' +
                                '<i class="fa fa-trash"></i>' +
                                '</button>' +
                                '</form>'

                            return btnEdit + ' ' + btnDelete
                        }
                    }

                ]
            })
        })
    </script>
@endsection
