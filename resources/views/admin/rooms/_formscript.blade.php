@section('js')
<script>
    // Use noConflict to release the $ variable
    jQuery.noConflict();

    // Now, use jQuery instead of $
    jQuery(document).ready(function($) {
        const route = @json(route('staff.search.category_rooms'));
        const routeUser = @json(route('staff.search.users'));
        var categoryRoomId = @json($room->category_room_id);

        $('#select2-example').select2({
            ajax: {
                url: route,
                dataType: 'json',
                delay: 250,
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
                cache: true
            }
        });

        $('#select2-user').select2({
            ajax: {
                url: routeUser,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    }
                }
            }
        });
    });
</script>

@endsection
