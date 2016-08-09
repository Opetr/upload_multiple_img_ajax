$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.validator.setDefaults({
    submitHandler: function() {


        $('form').submit( function(e) {
            e.preventDefault();


            var data = new FormData();
            //$('form').serializeArray();


            $.each($('#file4')[0].files, function (i, file) {
                data.append('file-' + i, file);
            });

            var jungle = $(this).find('select[name=jungle]').val();

            var name = $(this).find('input[name=name]').val();

            var comment = $(this).find('textarea[name=comment]').val();

            var form = $('form').html();

            if(jungle === undefined) {
                alert('dasdasd');
            }

            //post ajax
            $.ajax('photos',
                {
                    url: '/photos',
                    data: data,
                    name: name,
                    form: form,
                    comment: comment,
                    jungle: jungle,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',

                    xhr: function () {
                        var xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            console.log(Math.floor(e.loaded / e.total * 100) + '%');
                            console.log(jungle);
                            console.log(name);
                            console.log(comment);
                        };
                        return xhr;
                    },
                    success: function (data) {
                        //$('#LibScript').remove();
                        //$('#jQScript').remove();
                        //$('#QScript').remove();
                        //$('#ShareScript').remove();
                        //$('#additScript').remove();
                        $('form').html(form);
                        $(form).on( "submit", function() {

                                alert('Метод on подключен!');
                        });

                        //$.getScript("js/lib/jquery.js");
                        //$.getScript("js/dist/jquery.validate.js");
                        //$.getScript("http://code.jquery.com/ui/1.10.4/jquery-ui.min.js");
                        //$.getScript("js/dist/main_validation.js");
                        //$.getScript("js/dist/additional-methods.js");

                        //alert('Файл был успешно отправлен!');
                    },
                    error: function (data) {
                        alert('Ошибка передачи данных! Возможно вы пытались передать неверный формат изображения или файл был очень большим!');

                    }
                },
                function () {

                });

        });
    },

    showErrors: function(map, list) {
        // there's probably a way to simplify this
        var focussed = document.activeElement;
        if (focussed && $(focussed).is("input, textarea")) {
            $(this.currentForm).tooltip("close", {
                currentTarget: focussed
            }, true)
        }
        this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
        $.each(list, function(index, error) {
            $(error.element).attr("title", error.message).addClass("ui-state-highlight");
        });
        if (focussed && $(focussed).is("input, textarea")) {
            $(this.currentForm).tooltip("open", {
                target: focussed
            });
        }
    }
});



$(document).ready(function () {

    (function() {
        // use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
        $("#commentForm").tooltip({
            show: false,
            hide: false
        });

        // validate the comment form when it is submitted
        $("#commentForm").validate({

        });

    })();

    $('form').on('submit', function(e) {
        e.preventDefault();
    });


    $('#get').click(function (e) {
        e.preventDefault();

        // ajax get
        $.get("photos", function (data) {
            console.log(data);
        });
    });



});

