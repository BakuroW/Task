$(function() {

    refresh_shoutbox();
    setInterval("refresh_shoutbox()", 15000);


    $("#modalForm").validate({
        rules: {
            name:{
                required: true
            },
            email:{
                required: true
            },
            title:{
                required: true
            },
            recall:{
                required: true
            }
        },
        submitHandler: function(){}



    });





    $("#submit").click(function() {
        var name   =  $("#name").val();
        var email  =  $("#email").val();
        var title  =  $("#title").val();
        var recall =  $("#recall").val();

        var data = 'name='+ name +'&email='+ email + '&title=' + title + '&recall=' + recall;


        $.ajax({
            type: "POST",
            url: "/app/config/addRecall.php",
            data: data,
            success: function(){
                $("#myModal").modal("hide");
                $("#check").slideToggle(200).hide(7200);
                $('#modalForm')[0].reset();
            }
        });
        //return false;
    });

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
