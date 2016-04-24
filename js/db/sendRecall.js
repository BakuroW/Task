$(function() {

    refresh_shoutbox();
    setInterval(refresh_shoutbox, 15000);

    Recaptcha.create("6Ld0MR4TAAAAAM4_iyO9Sd8RoiCVYEOHCJWjPHXC", "captcha", {
        theme: "clean",
        callback: Recaptcha.focus_response_field
    });

// Add reCaptcha validator to form validation
    jQuery.validator.addMethod("checkCaptcha", (function() {
        var isCaptchaValid;
        isCaptchaValid = false;
        $.ajax({
            url: "app/recaptcha/checkCaptcha.php",
            type: "POST",
            async: false,
            data: {
                recaptcha_challenge_field: Recaptcha.get_challenge(),
                recaptcha_response_field: Recaptcha.get_response()
            },
            success: function(resp) {
                //alert(resp);
                if (resp === "true") {
                    isCaptchaValid = true;
                } else {
                    Recaptcha.reload();
                }
            }
        });
        return isCaptchaValid;
    }), "");


    $("#modalForm").validate({

        errorElement: "p",

        onkeyup: false,
        onfocusout: false,
        onclick: false,

        rules: {

            recaptcha_response_field: {
                required: true,
                checkCaptcha: true
            },

            name: {
                required: true,
                rangelength : [3,15],

                remote: {
                    url: "app/validation/check.php?type=check_name",
                    type: "POST"

                }

            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "app/validation/check.php?type=check_email",
                    type: "POST"

                }
            },
            title: {
                required: true,
                rangelength : [10,50],
                remote: {
                    url: "app/validation/check.php?type=check_title",
                    type: "POST"

                }

            },
            recall: {
                required: true,
                rangelength : [20,255],
                remote: {
                    url: "app/validation/check.php?type=check_recall",
                    type: "POST"

                }

            }
        },

        messages: {

            name: {
                required:    "Вы должны заполнить это поле",
                rangelength: "Имя не должно быть меньше 3 и не больше 15 символов"

                },

            email: {
                    required: "Вы должны заполнить это поле",
                    email:    "Не корректный email. Email дожен быть в виде 'example@gmail.com'"
                },

            title: {
                    required:    "Вы должны заполнить это поле",
                    rangelength: "Заголовок не должно быть меньше 4 и не больше 15 символов"
                },

            recall: {
                    required:  "Вы должны заполнить это поле",
                    rangelength: "Отзыв не должен быть меньше 20 и не больше 255 символов"
                },
            recaptcha_response_field: {
                checkCaptcha: "Your Captcha response was incorrect. Please try again."
                }
            },



        submitHandler: function () {


            var name   =  $("#name").val();
            var email  =  $("#email").val();
            var title  =  $("#title").val();
            var recall =  $("#recall").val();
            var filename = '';


            var data = 'name='+ name +'&email='+ email + '&title=' + title + '&recall=' + recall + '&filename=' + filename;

            $.ajax({
                type: "POST",
                url: "app/config/addRecall.php",
                data: data,
                success: function(){
                    //alert('2');
                    $("#myModal").modal("hide");
                    $("#check").slideToggle(200).hide(7200);
                    $('#modalForm')[0].reset();
                }
            });

            return false;
        }

    });


    function refresh_shoutbox() {

        var data = 'refresh=1';

        $.ajax({
            type: "POST",
            url: "app/config/addRecall.php",
            data: data,
            success: function(html){
                $("#showRecall").html(html);
            }
        });
    }


});
