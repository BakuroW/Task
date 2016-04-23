$(document).ready(function(){
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
        }
    });
});