<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/lib/jquery-1.11.1.js"></script>
    <script src="js/lib/jquery.js"></script>
    <script src="js/dist/jquery.validate.js"></script>
    <script src="js/dist/additional-methods.js"></script>
</head>
<body>
    <div class="container">
        <a href="#" id="get">Get</a>
        <hr>

        {!! Form::open(array('url' => '#', 'method' => 'post', 'files' => true, 'id' => 'fileForm', 'class'=>'img-form')) !!}
            <p>
                <label for="">name</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="file4">Select any audio or image file</label>
                <input type="file" id="file4" class="required" name="file4[]" multiple="multiple" accept="image/*,audio/*">
            </p>
            <p>
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <button type="submit">Submit</button>
            </p>

        {!! Form::close() !!}
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $(document).ready(function() {

            $("#fileForm").validate();

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
                $.each($('#file4')[0].files, function(i, file) {
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