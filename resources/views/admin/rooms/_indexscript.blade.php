@section('js')
    <script>
        const route = @json(route('staff.datatables.rooms'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#rooms').DataTable({
                dom: 'lifrtp',
                searching: true,
                processing: true,
               
                ajax: {
                    url: route,
                },
                columns: [{
                        data: 'category_room.name',
                        name: 'category_room.name',
                        orderable: true
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true
                    },
                    {
                        data: 'manager.name',
                        name: 'manager.name',
                        orderable: true
                    },
                    {
                        data: 'index',
                        name: 'index',
                        orderable: true
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
                            var buttonsRow = editButton + ' ' + deleteButton;

                            return buttonsRow;
                        }
                    }
                ]
            })
        })
        
    </script>
@endsection
