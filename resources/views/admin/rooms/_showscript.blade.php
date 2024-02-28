@section('js')
    <style>
        .swal2-validation-message {
            font-size: 14px;
            /* Kích thước font */
            color: red;
            /* Màu chữ */
            margin-top: 5px;
            /* Khoảng cách từ phía trên */
            background-color: rgb(43, 42, 42)
        }
    </style>
    <script>
        var j = jQuery.noConflict(true);
        j(document).ready(function() {
            j('#asset').DataTable({
                dom: 'lifrtp',
                processing: true,
                search: true,
            });
        })
    </script>
@endsection
