
function getParameterByName(name) { // extraer el id por get
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).ready(function () {
    var x = getParameterByName('id');
    var y = getParameterByName('nombre');
    if(x)
        listarLeer(x);
    if(y)
        listarLeer(y);
    listar_carrito_resumen_producto();
    //listar_carrito_nombre_producto();
});

function listarLeer(param) {
    $.post
            (
                    "../controller/producto.leer.datos.controller.php",
                    {
                        p_param: param
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            $.each(datosJSON.datos, function (i, item) {
                html += '<h3>'+item.descripcion+'</h3>';

                html += '<div class="group-md group-middle">';
                html += '  <div class="single-product-price">S/. '+item.precio+'</div>';
                html += '  <div class="box-rating"><span class="icon fa fa-star"></span><span class="icon fa fa-star"></span><span class="icon fa fa-star"></span><span class="icon fa fa-star"></span><span class="icon fa fa-star-half-o"></span></div>';
                html += '</div>';
                html += '<div class="divider divider-30"></div>';
                html += '<ul class="list list-description d-inline-block d-md-block">';
                html += '  <li><span>Tipo:</span><span>'+item.descripcion_categoria+'</span></li>';
                html += '  <li><span>Medida:</span><span>'+item.un_medida+'</span></li>';
                html += '  <li><span>Envase:</span><span>'+item.descripcion_envase+'</span></li>';
                html += '</ul>';
            });

            $("#listar").html(html);


        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

/*function listar_carrito_nombre_producto() { // se listará los productos que esten el carrito del cliente que inicie sesión.
    $.post
            (
                    "../controller/producto.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {

                html += '            <div class="unit align-items-center">';
                html += '              <div class="unit-left"><h6 class="cart-inline-name text-center"><a href="single-product.html">'+ item.descripcion +'</a></h6><a class="cart-inline-figure" href="single-product.html"><img src="fotos/productos/'+ item.id_producto +'.png" alt="" width="108" height="100"/></a></div>';
                html += '              <div class="unit-body"><br/>';
                
                html += '                <div>';
                html += '                  <div class="group-xs group-inline-middle">';
                html += '                    <div class="col-lg-10 text-center">';
                html += '                       Precio: <h8 class="cart-inline-title">S/. '+ item.precio_venta +'</h8>';
                html += '                    </div>';
                html += '                    <div class="form-wrap">Cant. Actual <br/>';
                html += '                      <input class="" size="8" type="text" value="'+ item.cantidad +'" disabled>';
                html += '                    </div>';
                html += '                    <div class="form-wrap">Actualizar Cant. <br/>';
                html += '                      <input class="text-center" style="width:90px" type="number" id="textCant'+ i +'" value = "0" data-zeros="true" min="1" max="1000">';
                html += '                    </div>';
                
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="actualizarCantProducto(' + item.id_producto + ', '+i+', '+ item.precio_venta +')"><ion-icon name="refresh-outline" size="small"></ion-icon></a>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="eliminar(' + item.id_producto + ')"><ion-icon name="trash-outline" size="small"></ion-icon></a>';
                html += '                  </div>';
                html += '                </div>';
                html += '              </div>';
                html += '            </div>';
                
            });
            $("#listarCarrito").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_carrito_resumen_producto() { // se lista el número total de productos y total de venta
    $.post
            (
                    "../controller/resumen.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {

                if(item.num_producto > 1)
                    html += '<h5 class="cart-inline-title">En el carrito:<span> '+ item.num_producto +'</span> productos</h5>';
                else
                    html += '<h5 class="cart-inline-title">En el carrito:<span> '+ item.num_producto +'</span> producto</h5>';
                html += '<h6 class="cart-inline-title">Precio total:<span> S/. '+ item.precio_total +'</span></h6>';
                
            });
            $("#listarResumenCarrito").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function actualizarCantProducto(codProducto, cont, precio) {
                    var cad1 = "textCant";
                    var nomb = cad1.concat(cont);
                    var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
                    
                    $.post(
                            "../controller/cantidad.producto.carrito.actualizar.controller.php",
                            {
                                p_codigo_producto: codProducto,
                                p_cant: cant,
                                p_precio: precio
                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;
                        if (datosJSON.estado === 200) { //ok
                            listar_carrito_nombre_producto();
                            listar_carrito_resumen_producto();
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}

function eliminar(codProducto) {
  
                
                    $.post(
                            "../controller/producto.carrito.eliminar.controller.php",
                            {
                                p_codigo_producto: codProducto
                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;
                        if (datosJSON.estado === 200) { //ok
                            listar_carrito_nombre_producto();
                            listar_carrito_resumen_producto();
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}

$("#frmgrabarCarrito").submit(function (event) {// guarda el producto en el carrito
    event.preventDefault();

                    p_producto_id= $("#textProducto_id").val(),
                    p_cant= $("#textCan").val()

                    $.post(
                            "../controller/carrito.compra.agregar.producto.controller.php",
                            {
                                p_producto_id: $("#textProducto_id").val(),
                                p_cant: $("#textCan").val()

                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;

                        if (datosJSON.estado === 200) {
                            listar_carrito_nombre_producto();
                            listar_carrito_resumen_producto();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                           ;
                        } else {
                            swal("Mensaje del sistema", resultado, "warning");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                        //alertify.error("<p class = 'text-white'>El usuario ya existe</p>");
                           // setTimeout("location.href='../view/menu.principal.view.php'",2000);
                    });

             

});


*/