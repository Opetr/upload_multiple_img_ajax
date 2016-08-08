$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {


    $('#get').click(function (e) {
        e.preventDefault();

        // ajax get
        $.get("photos", function (data) {
            console.log(data);
        });
    });

    $('form').submit(function (e) {
        e.preventDefault();

        var data = new FormData();
        $.each($('#file4')[0].files, function (i, file) {
            data.append('file-' + i, file);
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
                xhr: function () {
                    var xhr = $.ajaxSettings.xhr();
                    xhr.upload.onprogress = function (e) {
                        console.log(Math.floor(e.loaded / e.total * 100) + '%');
                    };
                    return xhr;
                },
                success: function (data) {
//                                alert(data);
                    console.log(data);
                },
                error: function (data) {

                }
            },
            function (data) {

            });
    });
});