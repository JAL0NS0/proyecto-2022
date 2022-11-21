$(document).ready(function() {
    $("#alertSI-login").hide();
    $("#alertNO-login").hide();

    $("#alertSI-registro").hide();
    $("#alertNO-registro").hide();

    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var anuncioParam = urlParams.get('reg');

    if(anuncioParam == "false"){
        D.writeText(D.id("alertNO"), 'Usuario o contraseña incorrectas'); 
        D.alertar($("#alertNO"));
    }

    $("#login").submit(function(e){   
        user = $.trim($("#email").val());
        pass = $.trim($("#pass").val());
        if(user.length<0 || pass.length<0){ 
            e.preventDefault(); 
            D.writeText(D.id("alertNO"), 'Por favor ingrese los datos necesarios'); 
            D.alertar($("#alertNO")); 
        }
    });   

});