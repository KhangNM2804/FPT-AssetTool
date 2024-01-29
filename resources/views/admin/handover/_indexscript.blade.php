@section('js')
    <script>
        var j = jQuery.noConflict(true);
        const route = @json(route('staff.search.rooms'));
        j(document).ready(function() {
            j('#handover').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
            });
            j('#select-rooms').select2({
                ajax: {
                    url: route,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term,
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: j.map(data, function(item) {
                               
                                return {
                                    text: item.name+' - '+item.manager.name,
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
        });
    </script>
@endsection
