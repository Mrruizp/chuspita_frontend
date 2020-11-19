$(function() {
    
    listar_mis_pedidos();

    cargarCbCodigoDepartamento("#cbRegion", "seleccione");
    //cargarCbCodigoProvincia("#cbProvincia", "seleccione");
    //cargarCbCodigoDistrito("#cbDistrito", "seleccione");
    //cargarCbCodigoDepartamento("#cbDepartamentoEmp", "seleccione");// departamento para empresa
    leerDatos();
    //listar_productos_mis_pedidos();
    
});

function listar_productos_mis_pedidos(p_id_pedido) {// muestra todos los productos de cada pedido finalizado, para cada cliente. Pág: mis.datos.view.php, ventana modal.
    $.post
            (
                    "../controller/mis.productos.pedidos.listar.controller.php",
                    {
                        p_idpedido : p_id_pedido
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

                html += '        <table class="table-custom table-custom-bordered">';
                html += '          <thead>';
                html += '            <tr>';
                html += '              <th style="text-align:center">Nombre del producto</th>';
                html += '              <th></th>'
                html += '              <th style="text-align:center">Precio</th>';
                html += '              <th style="text-align:center">Cantidad</th>';
                html += '              <th style="text-align:center">Subtotal</th>';
                html += '            </tr>';
                html += '          </thead>';
                html += '          <tbody>';
            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
                html += '            <tr>';
                html += '              <td style="text-align:center">'+ item.descripcion +'</td>';
                html += '              <br/><td style="text-align:center"><img src="'+ cadena +'" alt="" style="width:80px; height:56px;"/></td>';
                html += '              <td style="text-align:center">S/. '+ item.precio_venta +'</td>';
                html += '              <td style="text-align:center">'+ item.cantidad +'</td>';
                html += '              <td style="text-align:center">S/. '+ item.total_venta +'</td>';
                html += '            </tr>';
                
            });
            
            html += '          </tbody>';
            html += '        </table>';
            
            $("#Listar_roductos_mis_pedidos").html(html);
            
        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_mis_pedidos() {
    $.post
            (
                    "../controller/mis.pedidos.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            html += '<small>';
            html += '<table id="tabla-listado" class="table-custom table-custom-primary>';
            html += '<thead>';
            html += '<tr style="background-color: #ededed; height:25px;">';
            html += '<th style="text-align: center">NUM. PEDIDO</th>';
            html += '<th style="text-align: center">FECHA</th>';
            html += '<th style="text-align: center">CANTIDAD</th>';
            html += '<th style="text-align: center">IMPORTE TOTAL</th>';
            html += '<th style="text-align: center">ESTADO</th>';
            html += '<th style="text-align: center"></th>';
            html += '</tr>';
            html += '</thead>';
            html += '<tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                html += '<tr>';
                html += '<td align="center" style="font-weight:normal">' + item.nro_pedido + '</td>';
                html += '<td align="center" style="font-weight:normal">' + item.fecha_pedido + '</td>';
                html += '<td align="center" style="font-weight:normal">' + item.cantidad_productos + '</td>';
                html += '<td align="center" style="font-weight:normal">' + item.importe_total + '</td>';
                html += '<td align="center" style="font-weight:normal">' + item.estado + '</td>';
                html += '<td align="center">';
            //html += '<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalFoto" onclick="leerFoto(' + item.doc_id + ')"><i class="fa fa-camera"></i></button>';
            //html += '&nbsp;&nbsp;&nbsp;';
                html += '<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal_mis_pedidos" onclick="listar_productos_mis_pedidos(' + item.id_pedido + '); listar_totales_carrito_pedido(' + item.id_pedido + '); listado_datos_envio_pedido(' + item.id_pedido + '); "><ion-icon name="create-outline"></ion-icon> VER PEDIDO</button>';
                             
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';
            html += '</small>';

            $("#listarPedidos").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}


$("#frmgrabar").submit(function (event) {
    event.preventDefault();

   swal({
        title: "Confirme",
        text: "¿Esta seguro de grabar los datos ingresados?",
        confirmButtonColor: '#3d9205',
        buttons: {
            cancel: {
              text: "No",
              value: false,
              visible: true,
              className: "",
              closeModal: true,
            },
            confirm: {
              text: "Si",
              value: true,
              visible: true,
              className: "",
              closeModal: false
            }
          },
        icon: "../images/pregunta.png"
    }).then(
            function (isConfirm) {

                if (isConfirm) { //el usuario hizo clic en el boton SI     
                    //procedo a grabar
                    //Llamar al controlador para grabar los datos

                    //var codLab = ($("#txtTipoOperacion").val()==="agregar")? 

                    var codMisDatos = "";
                        codMisDatos = $("#textCorreo").val();
                    var cod_tipoCliente = "";
                        cod_tipoDoc = $("#cbTipoDoc").val();
                    var cod_tipoCliente = 0;
                        
                        if(cod_tipoDoc == "06")
                            cod_tipoCliente = 2;
                        else
                            cod_tipoCliente = 1;
                    
                    $.post(
                            "../controller/gestionarMisDatos.agregar.editar.controller.php",
                            {
                               
                    // datos personales:
                                p_tipo_cliente:         cod_tipoCliente,
                                p_tipo_doc_dp:          cod_tipoDoc,
                                p_nun_doc_dp:           $("#textNumDoc").val(),
                                p_nombres_dp:           $("#textNombres").val(),
                                p_nombres_comercial:    $("#textNombreComercial").val(),
                                
                                
                                p_tel_fijo_dp:          $("#textTelFijo").val(),
                                p_tel_celular_dp:       $("#textTelCelular").val(),
                                p_fec_nacimiento_dp:    $("#textFecNac").val(),
                                p_departamento_dp:      $("#cbRegion").val(),
                                p_provincia_dp:         $("#cbProvincia").val(),
                                p_distrito_dp:          $("#cbDistrito").val(),
                                p_direccion_dp:         $("#textDireccion").val(),

                    // datos empresas:
                    /*
                                p_razon_social_de:    $("#textRazonSocial").val(),
                                p_ruc_de:            $("#textRuc").val(),
                                p_tel_fijo_de:       $("#textTelFijoEmp").val(),
                                p_tel_celular_de:    $("#textTelCelularEmp").val(),
                    */
                                p_codigo_MisDatos: codMisDatos
                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;

                        if (datosJSON.estado === 200) {
                            swal("Exito", datosJSON.mensaje, "success");
                            location.href = "../view/mis.datos.view.php";
                            //listar(); //actualizar la lista
                        } else {
                            swal("Mensaje del sistema", resultado, "warning");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

                }
            });

});


$("#btnagregar").click(function () {
    $("#txtTipoOperacion").val("agregar");
    $("#txtCodigo").val("");
    $("#txtCurso").val("");
$("#titulomodal").html("Agregar nuevo Curso");
});


$("#myModal").on("shown.bs.modal", function () {
    $("#txtPuesto").focus();
});



function leerDatos() {

    var codMisDatos = "";
        codMisDatos = $("#textCorreo").val();

        
    $.post
            (
                    "../controller/gestionarMisDatos.leer.datos.controller.php",
                    {
                        p_codigo_MisDatos: codMisDatos
                    }
            ).done(function (resultado) {
        var jsonResultado = resultado;
        if (jsonResultado.estado === 200) {

        $("#cbRegion").val(jsonResultado.datos.cod_region);
        $("#cbProvincia").val(jsonResultado.datos.cod_provincia);
        $("#cbDistrito").val(jsonResultado.datos.cod_distrito);

        if(jsonResultado.datos.tipo_cliente == null) 
            $("#cbTipoCliente1").val("");
        if(jsonResultado.datos.tipo_cliente == "1")  
            $("#cbTipoCliente1").val("Jurídico");
        if(jsonResultado.datos.tipo_cliente =="2")  
            $("#cbTipoCliente1").val("Natural");
        // --
        
        if(jsonResultado.datos.tipo_documento == null) 
            $("#cbTipoDoc1").val("");
        if(jsonResultado.datos.tipo_documento == "01")
            $("#cbTipoDoc1").val("DNI");
        if(jsonResultado.datos.tipo_documento == "06")
            $("#cbTipoDoc1").val("RUC");
        if(jsonResultado.datos.tipo_documento == "04")
            $("#cbTipoDoc1").val("Carnet Extranjero");
        if(jsonResultado.datos.tipo_documento == "07")
            $("#cbTipoDoc1").val("Carnet Extranjero");

            $("#textNumDoc1").val(jsonResultado.datos.nro_documento);
            
            if(jsonResultado.datos.nombre){
                $("#estado_textNombres1").show();
                $("#estado_textNombres").show();
                $("#estado_nombre_comercial1").hide();
                $("#estado_nombre_comercial").hide();
            }else
            {
                $("#estado_nombre_comercial1").show();
                $("#estado_nombre_comercial").show();
                $("#estado_textNombres1").hide();
                $("#estado_textNombres").hide();
            }
                
            
            $("#textNombres1").val(jsonResultado.datos.nombre);
            $("#textNombreComercial1").val(jsonResultado.datos.nombre_comercial);
            $("#textTelFijo1").val(jsonResultado.datos.telefono_fijo);
            $("#textTelCelular1").val(jsonResultado.datos.telefono_celular);
            $("#textFecNac1").val(jsonResultado.datos.fecha_nacimiento);
            $("#textRegion1").val(jsonResultado.datos.nom_region);
            $("#textProvincia1").val(jsonResultado.datos.nom_provincia);
            $("#textDistrito1").val(jsonResultado.datos.nom_distrito);
            $("#textDireccion1").val(jsonResultado.datos.direccion);

            // modal

            if(jsonResultado.datos.tipo_cliente == null) 
            $("#cbTipoCliente1").val("");
        if(jsonResultado.datos.tipo_cliente == "1")  
            $("#cbTipoCliente1").val("Jurídico");
        if(jsonResultado.datos.tipo_cliente =="2")  
            $("#cbTipoCliente1").val("Natural");
        // --
        
        if(jsonResultado.datos.tipo_documento == null) 
            $("#cbTipoDoc").val("");
        if(jsonResultado.datos.tipo_documento == "01")
            $("#cbTipoDoc").val("DNI");
        if(jsonResultado.datos.tipo_documento == "06")
            $("#cbTipoDoc").val("RUC");
        if(jsonResultado.datos.tipo_documento == "04")
            $("#cbTipoDoc").val("Carnet Extranjero");
        if(jsonResultado.datos.tipo_documento == "07")
            $("#cbTipoDoc").val("Carnet Extranjero");

            $("#textNumDoc").val(jsonResultado.datos.nro_documento);
            $("#textNombres").val(jsonResultado.datos.nombre);
            $("#textNombreComercial").val(jsonResultado.datos.nombre_comercial);
            $("#textTelFijo").val(jsonResultado.datos.telefono_fijo);
            $("#textTelCelular").val(jsonResultado.datos.telefono_celular);
            $("#textFecNac").val(jsonResultado.datos.fecha_nacimiento);
            $("#textRegion").val(jsonResultado.datos.descripcion);
            $("#textProvincia").val(jsonResultado.datos.descripcion);
            $("#textDistrito").val(jsonResultado.datos.descripcion);
            $("#textDireccion").val(jsonResultado.datos.direccion);
        }
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}
