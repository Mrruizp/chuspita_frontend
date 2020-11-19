
$(function() {
    var validarDatos;
    listar_carrito_todos_productos_pedido();
    //listar();
    cargarCbCodigoFormaPago("#cb_forma_pago", "seleccione");
    document.getElementById('#textFechaEntrega').value = new Date().toDateInputValue();
    $('#textFechaEntrega').val(new Date().toDateInputValue());
    
    //cargarCbCodigoFechaEntrega("#cb_fecha_entrega", "seleccione");
    
   // validar_producto_en_Carrito();
    
   
});

function mostrarHorario(p_fechaEntrega){
    $("#cb_fecha_entrega").val("");
    cargarCbCodigoHorarioEntrega("#cb_fecha_entrega", p_fechaEntrega, "seleccione");
}
/*
function listar() {
    $.post
            (
                    "../controller/mostrarProducto.menuPrincipal.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
            html += '<table class="table-custom table-custom-primary table-checkout">';
            html += '<tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
                html += '<tr>';
                html += '      <td>Subtotal</td>';
                html += '      <td>S/. 100</td>';
                html += '    </tr>';
                html += '    <tr>';
                html += '      <td>Envío</td>';
                html += '      <td>S/. 10</td>';
                html += '    </tr>';
                html += '    <tr>';
                html += '      <td>Bolsa</td>';
                html += '      <td>S/. 0.00</td>';
                html += '    </tr>';
                html += '    <tr>';
                html += '      <td>Total</td>';
                html += '      <td>S/. 110</td>';
                html += '    </tr>';

            });
            
            html += '  </tbody>';
            html += '</table>';

            $("#listado_resumen").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}
*/
function listar_carrito_todos_productos_pedido() {
    $.post
            (
                    "../controller/producto.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;
        validarDatos = datosJSON.datos;
        if (datosJSON.estado === 200) {
            var html = "";
            
                html += '        <table class="table-custom table-cart">';
                html += '          <thead>';
                html += '            <tr>';
                html += '              <th>Nombre del producto</th>';
                html += '              <th>Precio</th>';
                html += '              <th>Cantidad</th>';
                html += '              <th>Total + igv</th>';
                html += '              <th>Opción</th>';
                html += '            </tr>';
                html += '          </thead>';
                html += '          <tbody>';
            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                this.validarDatos = i;
                html += '            <tr>';
                html += '              <td><a class="table-cart-figure" href="single-product.html"><img src="fotos/productos/'+ item.id_producto +'.png" alt="" width="146" height="132"/></a><a class="table-cart-link" href="single-product.html">'+ item.descripcion +'</a></td>';
                html += '              <td>S/. '+ item.precio_venta +'</td>';
                html += '              <td>';
                html += '                <div class="">';
                html += '                  <input class="text-center" type="number" id="textCantidad_'+ i +'" data-zeros="true" value="'+ item.cantidad +'" min="1" max="1000">';
                html += '                </div>';
                html += '              </td>';
                html += '              <td>S/. '+ item.p_total +'</td>';
                html += '              <td>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="actualizarCantProducto3(' + item.id_producto + ', '+i+', '+ item.precio_venta +')"><ion-icon name="refresh-outline" size="small"></ion-icon></a>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="eliminar(' + item.id_producto + ')"><ion-icon name="trash-outline" size="small"></ion-icon></a>';
                html += '              </td>';
                html += '            </tr>';
                
            });
            
            html += '          </tbody>';
            html += '        </table>';

            $("#Listar_carrito_all").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}


function actualizarCantProducto3(codProducto, cont, precio) { // se agregó esta función solo por que el nombre del input es diferente
                    var cad1 = "textCantidad_";
                    var nomb = cad1.concat(cont);
                    var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
                    
                    $.post(
                            "../controller/carrito.compra.agregar.producto.controller.php",
                            {
                                p_producto_id: codProducto,
                                p_cant: cant

                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;
                        if (datosJSON.estado === 200) { //ok
                            listar_carrito_nombre_producto();
                            listar_carrito_resumen_producto();
                            listar_carrito_total_venta();
                            listar_carrito_todos_productos();
                            listar_totales_carrito_pedido();
                            listar_totales_carrito_checkout();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}

$("#frmgrabarPedido").submit(function (event) {
    event.preventDefault();

    swal({
        title: "Confirme",
        text: "Desea confirmar pedido?",
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

                if (isConfirm) 
                { 
                    
                    if(validarDatos.length != 0)
                    {
                        
                    
                        if($("#textRUC").val())
                            p_ruc = $("#textRUC").val();
                        else
                                p_ruc = " - ";
                                
                        if($("#textRazonSocial").val())
                                p_razon_social = $("#textRazonSocial").val();
                        else
                            p_razon_social = " - ";
                            
                            $.post(
                                    "../controller/pedido.agregar.producto.controller.php",
                                    {
                                        p_cod_distrito: $("#cbDistrito").val(),
                                        p_dir_entrega:  $("#textDirecEntrega").val(),
                                        p_ref_entrega:  $("#textRefEntrega").val(),
                                        p_obs: $("#textObserv").val(),
                                        p_num_doc: $("#numDoc").val(),
                                        p_tipo_pago: $("#cb_forma_pago").val(),
                                        p_fecha_entrega: $("#cb_fecha_entrega").val(),
                                        p_ruc,
                                        p_razon_social,
                                        p_recibo: $("#cb_recibo").val()
        
                                    }
                            ).done(function (resultado) {
                                var datosJSON = resultado;
        
                                if (datosJSON.estado === 200) {
                                    //alertify.success("<p class = 'text-white'>Pedido agregado</p>");
                                    swal("SU PEDIDO HA SIDO ORDENADO", "", "success");
        
                                    $("#cbDistrito").html("");
                                    $("#textDirecEntrega").val("");
                                    $("#textRefEntrega").val("");
                                    $("#textObserv").val("");
                                    /*
                                    $('#cbDistrito').val($('#cbDistrito').data('default'));
                                    $('#cb_fecha_entrega').val($('#cbDistrito').data('default'));
                                    $('#cb_forma_pago').val($('#cbDistrito').data('default'));
                                    */
                                    $("#textRUC").val("");
                                    $("#textRazonSocial").val("");
                                    $("#cb_recibo").val("");
                                    //document.getElementById("input-group-radio").checked = false;
                                    //$("#numDoc").val("");
        
                                    listar_carrito_todos_productos();
                                    listar_carrito_resumen_producto();
                                    listar_carrito_nombre_producto();
                                    leerDatos_enviar_correo_automatico();
                                    //$("#cb_fecha_entrega").empty();
                                    //$("#cb_forma_pago").empty();
                                    //listar_totales_carrito_pedido();
                                    
                                    setTimeout("location.href='../view/mis.datos.view.php'",4000);
                                } else {
                                    swal("Mensaje del sistema", resultado, "warning");
                                }
        
                            }).fail(function (error) {
                                var datosJSON = $.parseJSON(error.responseText);
                                swal("Error", datosJSON.mensaje, "error");
                                //alertify.error("<p class = 'text-white'>El usuario ya existe</p>");
                                   // setTimeout("location.href='../view/menu.principal.view.php'",2000);
                            }); 
                    
                            
                    }else
                        alertify.error("<p class = 'text-white'>No tiene productos en el carrito de compras</p>");

                }
            });

});

function leerDatos_enviar_correo_automatico() {

                    var p_nro_pedido = "";
                    var p_tipo_documento = "";
                    var p_nro_documento = "";
                    var p_nombre = "";
                    var p_telefono_celular = "";
                    var p_correo = "";
                    var p_observacion = "";
                    var p_direccion_entrega = "";
                    var p_referencia_entrega = "";
                    var p_descripcion = "";
                    var p_precio = "";
                    var p_p_cantidad = "";
                    var p_total_venta = "";
                    var p_inafecto = "";
                    var p_gravado = "";
                    var p_exonerado = "";
                    var p_igv = "";
                    var p_subtotal = "";
                    var p_redondeo = "";
                    var p_tarifa = "";
                                
    $.post
            (
                    "../controller/obtener.datos.pedido.controller.php"
            ).done(function (resultado) {
        var jsonResultado = resultado;
        if (jsonResultado.estado === 200) {
            p_nro_pedido = jsonResultado.datos.nro_pedido;
            p_tipo_documento = jsonResultado.datos.tipo_documento;
            p_nro_documento = jsonResultado.datos.nro_documento;
            p_nombre = jsonResultado.datos.nombre;
            p_telefono_celular = jsonResultado.datos.telefono_celular;
            p_correo = jsonResultado.datos.correo;
            p_observacion = jsonResultado.datos.observacion;
            p_direccion_entrega = jsonResultado.datos.direccion_entrega;
            p_referencia_entrega = jsonResultado.datos.referencia_entrega;
            p_descripcion = jsonResultado.datos.descripcion;
            p_precio = jsonResultado.datos.precio;
            p_p_cantidad = jsonResultado.datos.cantidad;
            p_total_venta = jsonResultado.datos.total_venta;
            p_inafecto = jsonResultado.datos.inafecto;
            p_gravado = jsonResultado.datos.gravado;
            p_exonerado = jsonResultado.datos.exonerado;
            p_igv = jsonResultado.datos.igv;
            p_subtotal = jsonResultado.datos.subtotal;
            p_redondeo = jsonResultado.datos.redondeo;
            p_tarifa = jsonResultado.datos.tarifa;
            p_importe_total = jsonResultado.datos.importe_total;
            
            enviar_correo_automatico_pedido(
                                    
                                    p_nro_pedido,
                                    p_tipo_documento,
                                    p_nro_documento,
                                    p_nombre,
                                    p_telefono_celular,
                                    p_correo,
                                    p_observacion,
                                    p_direccion_entrega,
                                    p_referencia_entrega,
                                    p_descripcion,
                                    p_precio,
                                    p_p_cantidad,
                                    p_total_venta,
                                    p_inafecto,
                                    p_gravado,
                                    p_exonerado,
                                    p_igv,
                                    p_subtotal,
                                    p_redondeo,
                                    p_tarifa,
                                    p_importe_total
                                    
                                    );

        }
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}

function enviar_correo_automatico_pedido(
                                    p_nro_pedido,
                                    p_tipo_documento,
                                    p_nro_documento,
                                    p_nombre,
                                    p_telefono_celular,
                                    p_correo,
                                    p_observacion,
                                    p_direccion_entrega,
                                    p_referencia_entrega,
                                    p_descripcion,
                                    p_precio,
                                    p_p_cantidad,
                                    p_total_venta,
                                    p_inafecto,
                                    p_gravado,
                                    p_exonerado,
                                    p_igv,
                                    p_subtotal,
                                    p_redondeo,
                                    p_tarifa,
                                    p_importe_total
                                ) {
    $.post
            (
                    "../controller/enviar_correo_automatico.pedido.controller.php",
                    {
                                pnro_pedido            : p_nro_pedido,
                                ptipo_documento        : p_tipo_documento,
                                pnro_documento         : p_nro_documento,
                                pnombre                : p_nombre,
                                ptelefono_celular      : p_telefono_celular,
                                pcorreo                : p_correo,
                                pobservacion           : p_observacion,
                                pdireccion_entrega     : p_direccion_entrega,
                                preferencia_entrega    : p_referencia_entrega,
                                pdescripcion           : p_descripcion,
                                pprecio                : p_precio,
                                pp_cantidad            : p_p_cantidad,
                                ptotal_venta           : p_total_venta,
                                pinafecto              : p_inafecto,
                                pgravado               : p_gravado,
                                pexonerado             : p_exonerado,
                                pigv                   : p_igv,
                                psubtotal              : p_subtotal,
                                predondeo              : p_redondeo,
                                ptarifa                : p_tarifa,
                                pimporte_total        : p_importe_total
                    }
            ).done(function (resultado) {
        //alertify.success("<p class = 'text-white'>ok</p>");
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}
