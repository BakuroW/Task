$(function() {

    refresh_shoutbox();
    setInterval(refresh_shoutbox, 15000);

    $("#modalForm").validate({

        errorElement: "p",


        rules: {

            name: {
                required: true,
                rangelength : [3,15],

                remote: {
                    url: "app/validation/check.php?type=check_name",
                    type: "POST",
                    delay: 5000

                }

            },
            email: {
                required: true,
                email: true
            },
            title: {
                required: true,
                rangelength : [10,50]

            },
            recall: {
                required: true,
                rangelength : [20,255]

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
                    alert('2');
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
