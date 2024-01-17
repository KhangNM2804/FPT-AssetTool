@section('js')
    <script>
        var q = jQuery.noConflict(true);
        q(document).ready(function() {
            checkFileInput();
            
            q('#image').change(function() {
                readURL(this);
            })
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        q('#previewImage').attr('src', e.target.result);
                        q('#previewImage').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            function checkFileInput() {
                var input = q('#image');
                if (input.val()) {
                    readURL(input[0]);
                }
            }
        })
    </script>
@endsection
