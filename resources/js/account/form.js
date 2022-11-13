$(document).ready(function(){
    
    $('#first_name').keyup(function(){
        $('#user_name').val($("#first_name").val() + " " + $('#last_name').val());
    });

    $('#last_name').keyup(function(){
        $('#user_name').val($("#first_name").val() + " " + $(this).val());
    });

    $("body").on('click',function(){
        $('#user_name').val($("#first_name").val() + " " + $('#last_name').val());
    });
});

