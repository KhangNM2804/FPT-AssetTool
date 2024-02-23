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
                            var confirm = row.confirm_url;
                            var
                            return = row.return_url;
                            var del = row.delete_url;
                            var confirmButton = '<a  href="' + confirm +
                                '" class="btn btn-primary">Duyệt</a>';
                            var returnButton = '<a  href="' +
                                return +
                                    '" class="btn btn-success">Hoàn</a>';
                            var deleteButton = '<form action="' + del +
                                '" method="post" style="display: inline;">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button title="Hủy phiếu" type="submit" class="btn btn-danger" onclick="return confirm(\'Bạn có chắc chắn muốn ngừng hoạt động không?\')">' +
                                'Hủy</i>' +
                                '</button>' +
                                '</form>';
                            // Combine both buttons in the same row
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
