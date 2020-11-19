
$("#frmgrabarCambiarClave").submit(function (event) {
    event.preventDefault();

                    var p_clave = "";
                    var p_correo = "";
                    p_clave  = $("#textClave").val();
                    p_correo = $("#textCorreo").val();

               

                    $.post(
                            "../controller/cambiar.clave.editar.controller.php",
                            {
                                p_clave: $("#textClave").val()
                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;

                        if (datosJSON.estado === 200) {
                            alertify.success("<p class = 'text-white'>Se cambió su clave</p>");
                            enviar_correo_automatico(p_clave, p_correo);
                            setTimeout("location.href='../view/index.php'",2000);
                        } else {
                            swal("Mensaje del sistema", resultado, "warning");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                        alertify.error("<p class = 'text-white'>El usuario ya existe</p>");
                           // setTimeout("location.href='../view/menu.principal.view.php'",2000);
                    });

             

});

$("#frmgrabarUsuario").submit(function (event) {
    event.preventDefault();

                    clave1 = $("#textPassword1").val();
                    clave2 = $("#textPassword2").val();

                    if(clave1 === clave2)
                    {
                            $.post(
                                "../controller/registrate.usuario.agregar.controller.php",
                                {
                                    p_email: $("#textEmailR").val(),
                                    p_password: $("#textPassword1").val()
                                }
                        ).done(function (resultado) {
                            var datosJSON = resultado;

                            if (datosJSON.estado === 200) {
                                alertify.success("<p class = 'text-white'>Se registró su usuario</p>");
                                setTimeout("location.href='../view/index.php'",2000);
                            } else {
                                swal("Mensaje del sistema", resultado, "warning");
                            }

                        }).fail(function (error) {
                            var datosJSON = $.parseJSON(error.responseText);
                            swal("Error", datosJSON.mensaje, "error");
                            alertify.error("<p class = 'text-white'>El usuario ya existe</p>");
                               // setTimeout("location.href='../view/menu.principal.view.php'",2000);
                        });
                    }else
                        alertify.error("<p class = 'text-white'>Las contraseñas no son iguales</p>");

               

                    

             

});

$("#frmgrabarClave").submit(function (event) {
    event.preventDefault();
                            var email = "";
                                email = $("#textEmail").val();

                            leerDatos(email);

});

function leerDatos(email) {

                    var clave = "";
                                
    $.post
            (
                    "../controller/obtener.clave.controller.php",
                    {
                        p_email: email
                    }
            ).done(function (resultado) {
        var jsonResultado = resultado;
        if (jsonResultado.estado === 200) {
            clave = jsonResultado.datos.clave_desencriptada;
            
            enviar_correo_automatico(clave, email);

        }
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}

function enviar_correo_automatico(
                                    clave, email
                                ) {
    $.post
            (
                    "../controller/enviar_correo_automatico.controller.php",
                    {
                                p_email: email,
                                p_clave: clave
                    }
            ).done(function (resultado) {
        alertify.success("<p class = 'text-white'>Se envió su clave al correo</p>");
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}