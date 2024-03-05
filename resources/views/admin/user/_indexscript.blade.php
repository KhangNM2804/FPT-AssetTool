@section('js')
    <script>
        const route = @json(route('staff.datatables.users'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#user').dataTable({
                dom: 'lifrtp',
                search: true,
                processing: true,
                ajax: {
                    url: route
                },
                columns: [
                    {
                        data: 'email',
                        name: 'email'
                    },{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'role_name',
                        name: 'role_name'
                    },
                    
                    {
                        render: function(data, type, row) {
                            var edit = row.edit_url;
                            var btnEdit =
                                '<a class="btn btn-primary" href="' + edit +
                                '"><i class="fa fa-edit"></i></a>'
                            return btnEdit
                        }
                    }

                ]
            })
        })
    </script>
@endsection
