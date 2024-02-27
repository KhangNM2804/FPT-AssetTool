@section('js')
    <script>
        const route = @json(route('staff.datatables.borrows'));
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#borrow').DataTable({
                dom: 'lifrtp',
                searching: true,
                processing: true,

                ajax: {

                    url: route,
                },
                columns: [{
                        data: 'start_at',
                        name: 'start_at',

                    },
                    {
                        data: 'end_at',
                        name: 'end_at',

                    }, {
                        data: 'user.name',
                        name: 'user.name',

                    },
                    {
                        render: function(data, type, row) {
                            var detailsHtml = '';
                            row.details.forEach(function(detail) {
                                detailsHtml += '<span>' + detail.category.name + ' :' +
                                    detail.quantity + '</span><br>';
                            });
                            return detailsHtml;
                        }
                    },
                    {
                        render: function(data, type, row) {
                            if (row.status == 1)
                                return '<span class="badge badge-info">Đang chờ duyệt</span>'
                            else if (row.status == 2)
                                return '<span class="badge badge-success">Đang mượn</span>'
                            else if (row.status == 3)
                                return '<span class="badge badge-secondary">Đã trả</span>'
                            else if (row.status == 4)
                                return '<span class="badge badge-danger">Đã hủy</span>'
                        }
                    },
                    {

                        render: function(data, type, row) {
                            var confirm = row.accept_url;
                            var return_route = row.return_url;
                            var del = row.cancel_url;
                            var confirmButton = '';
                            var returnButton = '';
                            var deleteButton = '';
                            if (row.status == 1) {
                                confirmButton = '<form action="' + confirm +
                                    '" method="post" style="display: inline;">' +
                                    '@csrf' +
                                    '@method('PUT')' +
                                    '<button  type="submit" class="btn btn-primary" onclick="return confirm(\'Bạn có chắc chắn muốn duyệt phiếu không?\')">' +
                                    'Duyệt</i>' +
                                    '</button>' +
                                    '</form>';
                                deleteButton = '<form action="' + del +
                                    '" method="post" style="display: inline;">' +
                                    '@csrf' +
                                    '@method('PUT')' +
                                    '<button title="Hủy phiếu" type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn hủy không?\')">' +
                                    'Hủy</i>' +
                                    '</button>' +
                                    '</form>';
                            }

                            if (row.status == 2) {
                                returnButton = '<form action="' + return_route +
                                    '" method="post" style="display: inline;">' +
                                    '@csrf' +
                                    '@method('PUT')' +
                                    '<button type="submit" class="btn btn-success" onclick="return confirm(\'Bạn có chắc chắn muốn đánh dấu đã trả không?\')">' +
                                    'Hoàn</i>' +
                                    '</button>' +
                                    '</form>';
                            }

                            var buttonsRow = confirmButton + ' ' + returnButton + ' ' +
                                deleteButton;

                            return buttonsRow;
                        }
                    }
                ]
            })
        })
    </script>
@endsection
