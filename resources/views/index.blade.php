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

        <form action="#">
            <label for="">name</label>
            <input type="text" name="name">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                alert(data.data.key1); // or data.data['key1'] (?)
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

                var name = $(this).find('input[name=name]').val();

                //post ajax
                $.post('photos', {name: name}, function(data){
                    console.log(data);
                });
            });
        });
    </script>
</body>
</html>