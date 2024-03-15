@section('js')
    <script>
        const route = @json(route('staff.datatables.asset'));
        var j = jQuery.noConflict(true);

        j(document).ready(function() {

            const category = @json(route('staff.search.category-assets'));
            const group = @json(route('staff.search.group-assets'));
            j('#select-category').select2({
                ajax: {
                    url: category,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term,
                        }
                    },
                    processResults: function(data) {
                        data.unshift({
                            id: '',
                            name: 'Tất cả',
                        });
                        return {
                            results: j.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            })
                        }
                    },
                    cache: true,
                    minimumInputLength: 0,
                    maximumInputLength: 20,
                },

            });
            j('#select-group').select2({
                ajax: {
                    url: group,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term,
                        }
                    },
                    processResults: function(data) {
                        data.unshift({
                            id: '',
                            name: 'Tất cả',
                        });
                        return {
                            results: j.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            })
                        }
                    },
                    cache: true,
                    minimumInputLength: 0,
                    maximumInputLength: 20,

                }
            });


            var dataTable = j('#asset').DataTable({
                fixedColumns: true,
                dom: 'lifrtp',
                processing: true,
                search: true,
                scrollX: true,
                ajax: {
                    url: route,
                    data: function(d) {
                        d.category_id = category_id;
                        d.group_id = group_id;
                    }
                },
                columns: [{
                        data: 'image', // Đặt tên cột chứa đường dẫn ảnh
                        render: function(data, type, row) {
                            const avatarHtml =
                                `<div class="d-flex justify-content-center"">
                                    <div class="bg-white d-flex justify-content-center rounded-circle p-1">
                                    <img class="rounded-circle" alt="No image" src="{{ asset('storage/uploads') }}/${data}" width="40px" heigth="40px">
                                    </div>
                                </div>`;
                            return avatarHtml;
                        }
                    }, {
                        data: 'code',
                        name: 'code',

                        render: function(data, type, row) {
                            return data ? data :
                                '<span class="badge badge-secondary">Không có mã</span>';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',

                    },
                    {
                        data: 'document_number',
                        name: 'document_number',

                    },
                    {
                        data: 'invoice',
                        name: 'invoice',
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',

                    },
                    {
                        data: 'price',
                        name: 'price',
                        render: function(data, type, row) {
                            return numeral(data).format('0,0');
                        }
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                        render: function(data, type, row) {
                            return numeral(data).format('0,0');
                        }
                    },


                    {
                        render: function(data, type, row) {
                            if (row.status == 1) {
                                return '<span class="badge badge-success">Đang sử dụng</span>'
                            } else {
                                return '<span class="badge badge-danger">Đã thanh lý</span>'
                            }
                        }
                    },
                    {
                        render: function(data, type, row) {
                            var location = '';
                            row.asset_detail.forEach(function(element) {
                                var roomName = element.room ? element.room.name :
                                    'Chưa xác định';
                                location += roomName + ': ' + element.quantity + '<br>';
                            });
                            return location;
                        },

                    },
                    {
                        render: function(data, type, row) {
                            var edit = row.edit_url;
                            var del = row.delete_url;
                            var show = row.show_url;

                            var buttonEdit = '';
                            var buttonShow = '';
                            var buttonDelete = '';

                            if (edit != null) {
                                buttonEdit = '<a href="' + edit +
                                    '" class="btn btn-primary"><i class="fa fa-edit "></i></a>';
                            }
                            if (del != null) {
                                buttonDelete = '<form action="' + del +
                                    '" method="POST" style="display:inline;" class="">' +
                                    '@CSRF' +
                                    '@method('DELETE')' +
                                    '<button class="btn btn-danger " type="submit" onclick="return confirm(\'Bạn có chắc chắn ngừng hoạt động danh mục tài sản này?\')">' +
                                    '<i class="fa fa-trash"></i></button></form>';
                            }
                            if (show) {
                                buttonShow = '<a href="' + show +
                                    '" class="btn btn-info"><i class="fa fa-eye"></i></a>';
                            }
                            return buttonEdit + ' ' + buttonShow + ' ' + buttonDelete
                        },

                    }
                ]

            })
            var category_id = j('#select-category').val();
            var group_id = j('#select-group').val();
            j('#select-group').change(function() {
                category_id = j('#select-category').val();
                group_id = j('#select-group').val();
                dataTable.ajax.reload();
            });
            j('#select-category').change(function() {
                category_id = j('#select-category').val();
                group_id = j('#select-group').val();
                dataTable.ajax.reload();
            });
            
        })
    </script>
@endsection
