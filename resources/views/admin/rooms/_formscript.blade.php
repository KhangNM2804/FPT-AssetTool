@section('js')
    <script>
        // Use noConflict to release the $ variable
        jQuery.noConflict();
        // Now, use jQuery instead of $
        jQuery(document).ready(function($) {
            const route = @json(route('staff.search.category_rooms'));
            const routeUser = @json(route('staff.search.users'));


            $('#select2-example').select2({
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: route,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term, // từ khóa tìm kiếm
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            })
                        };
                    },
                    cache: true,
                    minimumInputLength: 0, // Số ký tự tối thiểu trước khi bắt đầu tìm kiếm
                    maximumInputLength: 20,
                }
            });

            $('#select2-user').select2({
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: routeUser,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term, // từ khóa tìm kiếm
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name+'-'+item.email,
                                    id: item.id
                                }
                            })
                        }
                    },
                    cache: true,
                    minimumInputLength: 0, // Số ký tự tối thiểu trước khi bắt đầu tìm kiếm
                    maximumInputLength: 20,
                }
            });
        });
    </script>
@endsection
