<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <title>Document</title>
    <link rel="stylesheet" media="screen" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css">

</head>
<body>
<div class="container">
    <a href="#" id="get">Get</a>
    <hr>

    {!! Form::open(array('url' => '#', 'method' => 'post', 'files' => true, 'id' => 'commentForm', 'class'=>'cmxform')) !!}
    <p>
        <label for="jungle">Выберите категорию</label>
        <br>
        <select id="jungle" name="jungle" title="Выберите категорию" required>
            <option value="">Выбрать категорию</option>
            <option value="1">Категория 1</option>
            <option value="2">Категория 2</option>
            <option value="3">Категория 3</option>
        </select>
    </p>
    <p>
        <label for="cname">Название фотографии</label><br>
        <input type="text" id="cname" minlength="2" class="ui-widget-content" name="name" title="" required>
    </p>

    <p>
        <label for="file4">Выберите одно или несколько изображений</label><br>
        <input type="file" id="file4" class="ui-widget-content" name="file4[]" multiple="multiple" accept="image/*,audio/*" title=""  required >
    </p>

    <p>
        <label for="ccomment">Описание фотографии</label><br>
        <textarea id="ccomment" class="ui-widget-content" name="comment" title="" required></textarea>
    </p>

    <p>
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <button type="submit">Добавить</button>
    </p>

    {!! Form::close() !!}
</div>

<script id="LibScript" src="js/lib/jquery.js"></script>
<script id="jQScript" src="js/dist/jquery.validate.js"></script>
<script id="additScript" src="js/dist/additional-methods.js"></script>
<script id="QScript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

<script id="ShareScript" src="js/main_ajax.js"></script>
</body>
</html>
