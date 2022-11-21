$(document).ready(function() {
    $("#alertSI").hide();
    $("#alertNO").hide();

    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var insert = urlParams.get('insert');

    if(insert == 1){
        D.writeText(D.id("alertNO"), 'El correo ya ha sido utilizado para crear una cuenta.'); 
        D.alertar($("#alertNO"));
    }else if(insert == 2){
        D.writeText(D.id("alertSI"), 'Usuario creado exitosamente.');
        D.alertar($("#alertSI"));
    }else if(insert == 3){
        D.writeText(D.id("alertNO"), 'Hubo un problema al guardar el usuario.');
        D.alertar($("#alertNO"));
    }

    $("#ingresar").submit(function(e){   
        nombre = $.trim($("#nombre").val());
        email = $.trim($("#email").val());
        edad = $.trim($("#edad").val());
        pass = $.trim($("#pass").val());
        pass2 = $.trim($("#pass2").val());
        if(nombre.length<=0 || email.length<=0 || edad.length<=0 || pass.length<=0 || pass2.length<=0 ){ 
            e.preventDefault(); 
            D.writeText(D.id("alertNO"), 'Por favor ingrese los datos necesarios.'); 
            D.alertar($("#alertNO")); 
        }else if(pass !== pass2){
            e.preventDefault(); 
            D.writeText(D.id("alertNO"), 'Las contraseñas no coinciden.'); 
            D.alertar($("#alertNO")); 
        }
    });   

});
