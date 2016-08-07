<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{!! csrf_token() !!}" />
    <title>Document</title>
</head>
<body>
    <form action="" method="post" id="test-form" enctype="multipart/form-data">
        name <input type="text" name="name" id="">
        <br>
        images <input type="file" name="image[]" multiple>
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <br>
        <button type="submit">Submit</button>
    </form>

    <script>
        var form = document.querySelector('form');
        var request = new XMLHttpRequest();
        request.open('POST', 'submit?', /* async = */ true);
        request.send();

        form.addEventListener('submit',function(e){
            e.preventDefault();
            var formData  = new FormData(document.getElementById('test-form'));

            request.open('post', 'submit');
            request.send(formData );


//        console.log(request);
        }, false);
    </script>
</body>
</html>