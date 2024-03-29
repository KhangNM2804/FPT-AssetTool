@section('js')
    <script>
        const route = @json(route('staff.datatables.asset_selled'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#asset_selled').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
                ajax: {
                    url: route,
                },
                columns: [
                    {
                        data: 'asset.category.name',
                        name: 'asset.category.name'
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
                        name: 'room.name'
                    },
                    {
                        render: function(data, type, row) {
                            if (row.status == 1) {
                                return '<span class="badge badge-success">Đang hoạt động</span>'
                            } else {
                                return '<span class="badge badge-danger">Ngừng hoạt động</span>'
                            }
                        }
                    }
                ]
            })
        })
    </script>
@endsection
