<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="#" id="get">Get</a>
        <hr>

        <form action="#" enctype="multipart/form-data">
            <label for="">name</label>
            <input type="text" name="name">
            <br>
            <br>
            <input type="file" id="images" name="images[]" multiple="multiple">
            <br>
            <br>
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $(document).ready(function() {

            $('#get').click(function(e) {
                e.preventDefault();

                    // ajax get
                    $.get( "photos", function( data ) {
                        console.log(data);
                    });
            });

            $('form').submit(function(e) {
                e.preventDefault();

                var data = new FormData();
                $.each($('#images')[0].files, function(i, file) {
                    data.append('file-'+i, file);
                });

                //post ajax
                $.ajax('photos',
                        {
                            url: '/photos',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST',
                            xhr: function() {
                                var xhr = $.ajaxSettings.xhr();
                                xhr.upload.onprogress = function(e) {
                                    console.log(Math.floor(e.loaded / e.total *100) + '%');
                                };
                                return xhr;
                            },
                            success: function(data){
//                                alert(data);
                                console.log(data);
                            }
                        },
                        function(data){

                });
            });
        });
    </script>
</body>
</html>