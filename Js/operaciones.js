$(document).ready(function () {
    $('#envia').click(function () {
        var user = $('#usuario').val();
        var pass = $('#password').val();
        if (user != '' && pass != '') {          
            $.ajax({
                url: 'controlador/login.php',
                method: 'POST',
                data: {usuario: user, password: pass},
                success: function (msg) {
                   
                    if (msg == 1) {
                        $('#mensaje').html('Datos incorrectos');
                    } else {
                        window.location = msg;
                    }
                }
            });
        } else {
            $('#mensaje').html('Ingrese los datos');
            alert("No sirve tu login")
        }

    });
enviardatos();

});


const enviardatos=()=>{
$("#fmresgitro").on("submit",function(e){
       
        const frm=$(this).serialize();
        $.ajax({
            method: 'POST',
            url: 'controlador/Registrar.php',
            data:frm
        }).done(function(info){
            //respuesta revidor

        })
})
}

