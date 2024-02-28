@section('js')
    <script>
        // Use noConflict to release the $ variable
        var j = jQuery.noConflict(true);
        // Now, use jQuery instead of $
        j(document).ready(function($) {
            const route = @json(route('staff.search.semester'));
            j('#select2-example').select2({
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

            
        });
    </script>
@endsection
