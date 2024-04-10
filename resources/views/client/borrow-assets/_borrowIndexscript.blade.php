@section('js')
    <script>
        $(document).ready(function() {
            $('#borrow').DataTable({
                scrollX: true,
                "order": [
                    [0, 'desc']
                ] // Sắp xếp cột đầu tiên tăng dần
            });
        });
    </script>
@endsection
