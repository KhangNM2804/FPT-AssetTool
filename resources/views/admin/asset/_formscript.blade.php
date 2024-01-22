@section('js')
    <script>
        var s = jQuery.noConflict(true);
        s(document).ready(function($) {
            const category = @json(route('staff.search.category-assets'));
            const group = @json(route('staff.search.group-assets'));
            //xử lý định dạng price
            var price = $('#price').val();
            var formattedPrice = numeral(price).format('0,0');
            $('#price').val(formattedPrice);
            // xử lý định dạng khi người dùng nhập liệu
            $('#price').on('input', function() {
                var inputVal = $(this).val().replace(/,/g, '');
                var formattedValue = numeral(inputVal).format('0,0');
                $(this).val(formattedValue);
            });
            //load dữ liệu cho select
            $('#select-category').select2({
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
                        return {
                            results: $.map(data, function(item) {
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
            $('#select-group').select2({
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
                        return {
                            results: $.map(data, function(item) {
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
            //xử lý hiện image
            checkFileInput();
            s('#image').change(function() {
                readURL(this);
            })

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        s('#previewImage').attr('src', e.target.result);
                        s('#previewImage').show();
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function checkFileInput() {
                var input = s('#image');
                if (input.val()) {
                    readURL(input[0]);
                }
            }
        });
    </script>
@endsection
