@section('js')
    <script>
        const route = @json(route('staff.datatables.semester'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#semester').dataTable({
                dom: 'lifrtp',
                search: true,
                processing: true,
                ajax: {
                    url: route
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'start_at',
                        name: 'start_at'
                    },
                    {
                        data: 'end_at',
                        name: 'end_at'
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
