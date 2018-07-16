    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#datosImagen").change(function () {
        readURL(this);
    });

    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("textarea").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color","#fff");
    })
     $("textarea").blur(function(){
        $(this).css("background-color","#fff");
    })

     