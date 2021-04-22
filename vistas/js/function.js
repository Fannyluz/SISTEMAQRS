

    
//cambiar pasword
$('.newPass').keyup(function(){
    validPass(); 
});


//form cambiar contraseña
$('#frmChangePass').submit(function(e){
    e.preventDefault();

    //crear variables
    var passActual = $('#txtPassUser').val();
    var passNuevo = $('#txtNewPassUser').val();
    var ConfirmPassNuevo = $('#txtPassConfirm').val();
    var action = "changePassword";

    if( passNuevo != ConfirmPassNuevo){
        $('.alertChangePass').html('<p style="color:red;">Las contraseñas no son iguales.</p>');
        $('.alertChangePass').slideDown();
        return false;
    }

    if( passNuevo.length < 5){
        $('.alertChangePass').html('<p style="color:red;">La nueva contraseña debe ser de 5 caracteres como minimo.</p>');
        $('.alertChangePass').slideDown();
        return false;
    }

    $.ajax({
        url : 'ajax.php',
        type: "POST",
        async : true,
        data: { action:action,passActual:passActual,passNuevo:passNuevo},

        success: function(response)
        {
            console.log(response);
        },
        error: function(error) {

        }
    });
});


function validPass(){
    var passNuevo = $('#txtNewPassUser').val();
    var ConfirmPassNuevo = $('#txtPassConfirm').val();

    if( passNuevo != ConfirmPassNuevo){
        $('.alertChangePass').html('<p style="color:red;">Las contraseñas no son iguales.</p>');
        $('.alertChangePass').slideDown();
        return false;
    }

    if( passNuevo.length < 5){
        $('.alertChangePass').html('<p style="color:red;">La nueva contraseña debe ser de 5 caracteres como minimo.</p>');
        $('.alertChangePass').slideDown();
        return false;
    }

    $('.alertChangePass').html('');
    $('.alertChangePass').slideUp();
}