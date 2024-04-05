@section('js')
    <script>
        var j = jQuery.noConflict(true);
        var route = @json(route('staff.datatables.invoices'));
        j(document).ready(function() {
            j('#invoice').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
                ajax: {
                    url: route,
                },
                columns: [{
                        render: function(data, type, row) {
                            return (row.denominator ? row.denominator : '') + row.symbol + row
                                .invoice_number
                        }
                    },

                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        render: function(data, type, row) {
                            const show =
                                ` <a class="btn btn-primary" href="{{ asset('storage/dpf') }}/${row.path}" target="_blank"><i class="fa fa-eye"></i></a>`;
                            const deletebtn = '<form action="' + row.delete_url +
                                '" method="post" style="display: inline;">' + '@csrf' +
                                '@method('DELETE')' +
                                '<button class="btn btn-danger" type="submit" onclick="return confirm(\'Bạn có chắc chắn muốn xóa hóa đơn ?\')">' +
                                '<i class="fa fa-trash"></i>' +
                                '</button>' +
                                '</form>'
                            return show+' '+deletebtn;
                        }
                    },
                ]
            })
        });
    </script>
@endsection
