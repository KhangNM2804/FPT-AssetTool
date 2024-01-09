@section('js')
    <script>
        const route = @json(route('staff.datatables.category_rooms'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#category_rooms').DataTable({
                dom: 'lifrtp',
                searching: true,
                processing: true,
                serverSide: true,
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
                            var editButton = '<a href="' + edit +
                                '" class="btn btn-info"><i class="fa fa-edit"></i></a>';
                            var deleteButton = '<form action="' + del +
                                '" method="post" style="display: inline;">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn ngừng hoạt động không?\')">' +
                                '<i class="fa fa-trash"></i>' +
                                '</button>' +
                                '</form>';
                            // Combine both buttons in the same row
                            var buttonsRow =  editButton + ' ' + deleteButton ;

                            return buttonsRow;
                        }
                    }
                ]
            });
        });
    </script>
@endsection
