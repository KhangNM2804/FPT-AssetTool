@section('js')
    <script>
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#handover').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
            });
        });
    </script>
@endsection
