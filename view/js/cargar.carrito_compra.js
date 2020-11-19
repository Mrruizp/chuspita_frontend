$(document).ready(function () {
    listar_carrito_resumen_producto(); // cabecera del carrito de compras, en la barra superior
    listar_carrito_nombre_producto();
    listar_carrito_total_venta(); // lista el precio total del carrito de compra
    listar_carrito_todos_productos();
    listar_carrito_todos_productos_checkout();
    listar_totales_carrito();
    listar_totales_carrito_checkout();
    var param = 0; 
    param = getParameterByName('id')
    if(param)
    {
        listarProductos(param);
    }

    
    //listar_mum_producto_carrito();
    //cargarCbCodigoDistrito("#cbDistrito", "seleccione");
    //var p_cant_producto = 0;
   
});
function dosDecimales(n) {
  let t=n.toString();
  let regex=/(\d*.\d{0,2})/;
  return t.match(regex)[0];
}

function getParameterByName(name) { // extraer el id por get
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


function listar_totales_carrito_pedido(p_id_pedido) { // muestra el subtotal, envío, total de un pedido finalizado, de un cliente
    $.post
            (
                    "../controller/totalespago.pedido.listar.controller.php",
                    {
                        p_cod_pedido : p_id_pedido
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

                    html += '        <table class="table-custom table-custom-bordered">';
                html += '          <thead>';
                html += '            <tr>';
                html += '              <th style="text-align:center">CANTIDAD</th>';
                html += '              <th style="text-align:center">INAFECTO</th>';
                html += '              <th style="text-align:center">GRAVADO</th>';
                html += '              <th style="text-align:center">EXONERADO</th>';
                html += '              <th style="text-align:center">IGV</th>';
                html += '              <th style="text-align:center">SUBTOTAL</th>'
                html += '              <th style="text-align:center">REDONDEO</th>';
                html += '              <th style="text-align:center">COSTO DEL ENVÍO</th>';
                html += '              <th style="text-align:center">TOTAL</th>';
                html += '            </tr>';
                html += '          </thead>';
                html += '          <tbody>';
            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                html += '            <tr>';
                html += '              <td style="text-align:center">'+ item.num_producto  +'</td>';
                if(item.redondeo)
                    html += '              <td style="text-align:center">S/. '+ item.inafecto +'</td>';
                else
                    html += '              <td style="text-align:center">S/. 0.0</td>';
                if(item.redondeo)
                    html += '              <td style="text-align:center">S/. '+ item.gravado +'</td>';
                else
                    html += '              <td style="text-align:center">S/. 0.0</td>';
                if(item.redondeo)
                    html += '              <td style="text-align:center">S/. '+ item.exonerado +'</td>';
                else
                    html += '              <td style="text-align:center">S/. 0.0</td>';
                if(item.redondeo)
                    html += '              <td style="text-align:center">S/. '+ item.igv +'</td>';
                else
                    html += '              <td style="text-align:center">S/. 0.0</td>';
                html += '              <td style="text-align:center">S/. '+ item.precio_total  +'</td>';
                if(item.redondeo)
                    html += '              <td style="text-align:center">S/. '+ item.redondeo +'</td>';
                else
                    html += '              <td style="text-align:center">S/. 0.0</td>';
                html += '              <td style="text-align:center">S/. '+ item.tarifa_distrito +'</td>';
                html += '              <td style="text-align:center">S/. '+ item.p_total+'</td>';
                html += '            </tr>';
                
            });
            
            html += '          </tbody>';
            html += '        </table>';

            $("#ListaTotales_carrito").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listado_datos_envio_pedido(p_id_producto) { 
    $.post
            (
                    "../controller/datos_envio.pedido.listar.controller.php",
                    {
                        p_cod_producto : p_id_producto
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {

                    
                    html += '  <div class="radio-panel">';
                    html += '    <label class="title">';
                    html += '      <h7><b>Entregado a:</b> '+ item.observacion +'</h7>';
                    html += '    </label>';
                    html += '  </div>';
                    html += '  <div class="radio-panel">';
                    html += '    <label class="title">';
                    html += '      <h7><b>Dirección:</b> '+ item.direccion_entrega +'</h7>';
                    html += '    </label>';
                    html += '  </div>';
                    html += '  <div class="radio-panel">';
                    html += '    <label class="title">';
                    html += '      <h7><b>Referencia:</b> '+ item.referencia_entrega +'</h7>';
                    html += '    </label>';
                    html += '  </div><br/><br/>';
                
            });
                

            $("#Lista_datos_envio_pedido").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_totales_carrito() { //se muestra en página mis pedidos.
    $.post
            (
                    "../controller/resumen.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

                html += '        <table class="table-custom table-custom-bordered">';
                html += '          <thead>';
                html += '            <tr>';
                html += '              <th style="text-align:center">Cantidad</th>';
                html += '              <th style="text-align:center">Inafecto</th>';
                html += '              <th style="text-align:center">Gravado</th>';
                html += '              <th style="text-align:center">Exonerado</th>';
                html += '              <th style="text-align:center">Igv</th>';
                html += '              <th style="text-align:center">Redondeo</th>';
                html += '              <th style="text-align:center">Subtotal</th>';
                html += '              <th style="text-align:center">Envío</th>';
                html += '              <th style="text-align:center">Total</th>';
                
                html += '            </tr>';
                html += '          </thead>';
                html += '          <tbody>';
            $.each(datosJSON.datos, function (i, item) {
                    let cant_productos = Math.trunc(item.num_producto);
                    html += '    <tr>';
                    html += '       <td> '+ cant_productos +' Uni</td>';
                    
                  
                    
                    if(item.inafecto)
                        html += '       <td>S/. '+ item.inafecto +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                    
                 
                    
                    if(item.gravado)
                        html += '       <td>S/. '+ item.gravado +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                   ;
                  
                    
                    if(item.exonerado)
                        html += '       <td>S/. '+ item.exonerado +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                   
                   
                    
                    if(item.igv)
                        html += '       <td>S/. '+ item.igv +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                    if(item.redondeo)
                        html += '       <td>S/. '+ item.redondeo +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                    
                    html += '       <td>S/. '+ item.subtotal +'</td>';
                    html += '       <td>S/. '+ item.tarifa +'</td>';
                    html += '       <td>S/. '+ item.importe_total +'</td>';
                    html += '    </tr>';
                
            });
                
                html += '          </tbody>';
            html += '        </table>';
            $("#ListaTotales_carrito").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_totales_carrito_checkout() { //se muestra en producto.checkout, totales del carrito, Subtotal
    $.post
            (
                    "../controller/resumen_total.pedido.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            //var p_subtotal;
                html += '<table class="table-custom table-custom-primary table-checkout">';
                    html += '    <tbody>';
            $.each(datosJSON.datos, function (i, item) {
                    let cant_productos = Math.trunc(item.num_producto);
                    //p_subtotal =    parseFloat(item.igv) + parseFloat(item.gravado);
                    html += '    <tr>';
                    html += '       <td>Cantidad de productos </td>';
                    html += '       <td> '+ cant_productos +' Uni</td>';
                    html += '    </tr>';
                    
                    html += '    <tr>';
                    html += '       <td>Inafecto </td>';
                    
                    if(item.inafecto)
                        html += '       <td>S/. '+ item.inafecto +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                    html += '    </tr>';
                    
                    html += '    <tr>';
                    html += '       <td>Gravado </td>';
                    
                    if(item.gravado)
                        html += '       <td>S/. '+ item.gravado +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                    html += '    </tr>';
                    
                    html += '    <tr>';
                    html += '       <td>Exonerado </td>';
                    
                    if(item.exonerado)
                        html += '       <td>S/. '+ item.exonerado +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                    html += '    </tr>';
                    
                    html += '    <tr>';
                    html += '       <td>IGV </td>';
                    
                    if(item.igv)
                        html += '       <td>S/. '+ item.igv +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                    html += '    </tr>';
                    
                    html += '    <tr>';
                    html += '       <td>Subtotal </td>';
                    html += '       <td>S/. '+ item.subtotal +'</td>';
                    html += '    </tr>';
                    
                    html += '    <tr>';
                    html += '       <td>Redondeo </td>';
                    
                    if(item.redondeo)
                        html += '       <td>S/. '+ item.redondeo +'</td>';
                    else
                        html += '       <td>S/. 0.0</td>';
                        
                    html += '    </tr>';
                
            });
                
                html += '   </tbody>';
                html += '</table>';
            $("#ListaTotales_carrito_checkout").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_precio_envio(p_id_distrito) { // muestra el precio de envío, total de un pedido finalizado, de un cliente
    if(p_id_distrito === "-")
    {
        ocultarPrecio_total_pedido();
    }else
        {
            mostrarPrecio_total_pedido();
        }
    $.post
            (
                    "../controller/precio_envio.pedido.listar.controller.php",
                    {
                        p_cod_distrito : p_id_distrito
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
    
                html += '<table class="table-custom table-custom-primary table-checkout">';
                    html += '    <tbody>';                
            $.each(datosJSON.datos, function (i, item) {


                    html += '    <tr>';
                    html += '       <td>Costo del envío </td>';
                    html += '       <td>S/. '+ item.tarifa +'</td>';
                    html += '    </tr>';
                    
                    listar_precio_total_pedido(item.tarifa);
            });
                
                html += '   </tbody>';
                html += '</table>';

            $("#ListaPrecio_envio").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_precio_total_pedido(p_tarifa) { // se muestra en producto.checkout.view.php, el precio total del pedido
    $.post
            (
                    "../controller/precio_total.pedido.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var precio_total = 0.0;
            var precio = 0.0;
            var p_redondeo = 0.0;
            var precio_envio = parseFloat(p_tarifa);;
                    html += '<table class="table-custom table-custom-primary table-checkout">';
                    html += '    <tbody>';
            $.each(datosJSON.datos, function (i, item) {
                    precio = parseFloat(item.precio_total);
                    p_redondeo = parseFloat(item.redondeo);
                    precio_total = precio + precio_envio + p_redondeo;

                    html += '    <tr>';
                    html += '       <td>Total </td>';
                    html += '       <td>S/. '+ precio_total.toFixed(2) +'</td>';
                    html += '    </tr>';
                    //html += '    <tr>';
                    //html += '      <td>Total</td>';
                    //html += '      <td>S/. '+ item.precio_total +'</td>';
                    //html += '    </tr>';
                
            });
                
                html += '   </tbody>';
                html += '</table>';

            $("#ListaPrecio_total_pedido").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}


function listar_carrito_total_venta() { // muestra el subtotal en la pág.: carrito.compra.view.php
    $.post
            (
                    "../controller/resumen.carrito.pedido.listar.controller"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {
               
               if( item.p_precio_total == null)
                html += '        <h3 class="cart-product-price"><sup>S/.</sup> 0.00</h3>';
               else
                html += '        <h3 class="cart-product-price"><sup>S/.</sup>'+ item.p_precio_total +'</h3>';
                
                
            });
            

            $("#ListaFinalizarCompra").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_carrito_nombre_producto() { // se listará los productos que esten el carrito del cliente que inicie sesión.
    $.post
            (
                    "../controller/producto.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            
            $.each(datosJSON.datos, function (i, item) {
                
                html += '            <div class="unit align-items-center">';
                html += '              <div class="unit-left"><small class="cart-inline-name text-center">'+ item.descripcion +'</small><br/><img src="https://lachuspita.pe/backend/_lib/file/img/productos/'+ item.id_producto +'.png" style="width:180px; height:172px;"/></div>';
                html += '              <div class="unit-body"><br/>';
                
                html += '                <div>';
                html += '                  <div class="group-xs group-inline-middle">';
               
                
                html += '                    <div class=""><br/>';
                html += '                      <input class="" style="width:90px" type="number" id="textCant'+ i +'" value = "'+ item.cantidad +'" data-zeros="true" min="1" max="1000">';
                html += '                    </div>';
                
                html += '                        <a class="btn btn-md button-plomo button-plomo" href="#" style="width:90px" onclick="actualizarCantProducto(' + item.id_producto + ', '+i+', '+ item.precio_venta +')"><ion-icon name="refresh-outline" size="small"></ion-icon></a>';
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


function listarProductos(p_id_seccion) {
    mostrarListarProductos();
    $.post
            (
                    "../controller/productos.listar.controller.php",
                    {
                        id_seccion: p_id_seccion
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
            var cad1 = "#textCantidadCliente";
            var nomb = "";
            var nombreInput = "";

           
            html += '<table class="table-custom table-cart">';
            html += '  <thead>';
            html += '    <tr style="background-color:#ff4a4a;">';
            if(p_id_seccion == 2)
            html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> La Caserita</th>';
            if(p_id_seccion == 6)
                html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> La Dulcera</th>';
            if(p_id_seccion == 5)
                html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> La Reposteria</th>';
            if(p_id_seccion == 4)
                html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> Limpieza del Hogar</th>';
            if(p_id_seccion == 3)
                html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> Limpieza Personal</th>';

            html += '      <th class="text-white"></th>';
            html += '      <th class="text-white"></th>';
            html += '    </tr>';
            html += '  </thead>';
            html += ' <tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                //cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/"+ item.id_producto +".png";
                html += '<tr>';
                html += ' <td>';
                html += '  <a class="table-cart-figure" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">';
                html += '   <img src="https://lachuspita.pe/backend/_lib/file/img/productos/'+ item.id_producto +'.png" style="width:146px; height:132px;"/>';
                html += '  </a>';
                html += '  <p>'+ item.descripcion +'</p>';
                html += ' </td>';
                

                html += '<td>S/. '+ item.precio +'</td>';
                html += '<td>';
                html += '  <div class="table-cart-stepper">';
                html += '    <input type="number" class= "text-center" id="textCantidad'+ i +'" data-zeros="true" value="1" min="1" max="100">';
                
                if(item.cantidad)
                {
                    if(item.cantidad == 1)
                        html += '<small class = "text-primary"><b>'+ Math.round(item.cantidad) +'</b> en carrito</small>';
                    else
                        html += '<small class = "text-primary"><b>'+ Math.round(item.cantidad) +'</b> en carrito</small>';
                }
                //mostrar_cant_producto(item.id_producto, i); // muestra la cantidad de un producto que ha registrado el cliente en su carrito de compras
                        
                //html += '<p style="font-family: Arial; font-size: 6pt; color: #3c6a36" class = "text-primary"><input type="text" class= "col-5 text-center" id="textCantidadCliente'+ i +'" name="textCantidadCliente'+ i +'" disabled><br/>EN CARRITO</p';
                       
                html += '  </div><br/>';
                html += '  <div class="form-button">';
                html += '    <button class="button button-primary button-pipaluk button-md" onclick="actualizarCantProducto2(' + item.id_producto + ', '+i+', '+ item.precio +')">AGREGAR</button>';
                html += '  </div>';
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';

            $("#nolistadoPerecibles").html(html);


        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function ocultarPrecio_total_pedido()
{
    document.getElementById("ListaPrecio_total_pedido").style.display = 'none';
}

function mostrarPrecio_total_pedido()
{
    document.getElementById("ListaPrecio_total_pedido").style.display = 'block';
}

function ocultarListarPrecioProductos()
{
    document.getElementById("nolistadoPerecibles").style.display = 'none';
    document.getElementById("listaDescripcionProductos").style.display = 'none';
    document.getElementById("listaMayorMenorPrecioProductos").style.display = 'block';
    document.getElementById("listaTipoProducto").style.display = 'none';
}

function ocultarListarProductos()
{
    document.getElementById("nolistadoPerecibles").style.display = 'none';
    document.getElementById("listaMayorMenorPrecioProductos").style.display = 'none';
    document.getElementById("listaDescripcionProductos").style.display = 'block';
    document.getElementById("listaTipoProducto").style.display = 'none';
}
function mostrarListarProductos()
{
    document.getElementById("nolistadoPerecibles").style.display = 'block';
    document.getElementById("listaMayorMenorPrecioProductos").style.display = 'none';
    document.getElementById("listaDescripcionProductos").style.display = 'none';
    document.getElementById("listaTipoProducto").style.display = 'none';
}
function mostrarListarProductos_tipo()
{
    document.getElementById("listaTipoProducto").style.display = 'block';
    document.getElementById("nolistadoPerecibles").style.display = 'none';
    document.getElementById("listaMayorMenorPrecioProductos").style.display = 'none';
    document.getElementById("listaDescripcionProductos").style.display = 'none';
}

function listarDescripcionProductos() {
            var desProducto = $("#search-form").val();
    $.post
            (
                    "../controller/buscarPorDescripcionProductos.listar.controller.php",
                    {
                        p_desProducto : desProducto
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
            var cad1 = "#textCantidadCliente";
            var nomb = "";
            var nombreInput = "";

           
            html += '<table class="table-custom table-cart">';
            html += '  <thead>';
            html += '    <tr style="background-color:#ff4a4a;">';
            html += '      <th class="text-white"><ion-icon name="search-outline" onclick="mostrarListarProductos();"></ion-icon> Todos los productos</th>';
            html += '      <th class="text-white"></th>';
            html += '      <th class="text-white"></th>';
            html += '    </tr>';
            html += '  </thead>';
            html += ' <tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/'+ item.id_producto +'.png"
                html += '<tr>';
                html += ' <td>';
                html += '  <a class="table-cart-figure" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">';
                html += '   <img src="'+ cadena +'" alt="" width="146" height="132"/>';
                html += '  </a>';
                html += '  <p>'+ item.descripcion +'</p>';
                html += ' </td>';
                

                html += '<td>S/. '+ item.precio +'</td>';
                html += '<td>';
                html += '  <div class="table-cart-stepper">';
                html += '    <input type="number" class= "text-center" id="textCantidad1'+ i +'" data-zeros="true" value="1" min="1" max="100">';
                
                if(item.cantidad)
                {
                    if(item.cantidad == 1)
                        html += '<small class = "text-primary"><b>'+ Math.round(item.cantidad) +'</b> en carrito</small>';
                    else
                        html += '<small class = "text-primary"><b>'+ Math.round(item.cantidad) +'</b> en carrito</small>';
                }

                //mostrar_cant_producto2(item.id_producto, i); // muestra la cantidad de un producto que ha registrado el cliente en su carrito de compras
                        
                //html += '<p style="font-family: Arial; font-size: 6pt; color: #3c6a36" class = "text-primary"><input type="text" class= "col-5 text-center" id="textCantidadCliente1'+ i +'" name="textCantidadCliente1'+ i +'" disabled><br/>EN CARRITO</p';
                       
                html += '  </div><br/>';
                html += '  <div class="form-button">';
                html += '    <button class="button button-primary button-pipaluk button-md" onclick="actualizarCantProducto22(' + item.descripcion + ', '+i+', '+ item.precio +')">AGREGAR</button>';
                html += '  </div>';
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';

            $("#listaDescripcionProductos").html(html);


        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function mostrar_cant_producto(cod_producto, cont,) {// muestra la cantidad de un producto que ha registrado el cliente en su carrito de compras
                    var cad1 = "#textCantidadCliente";
                    var nomb = cad1.concat(cont);
                    var cant = 0;
                    var cad2 = "textCantidadCliente";
                    var nomb2 = cad2.concat(cont);
                    //var x = document.createElement(nomb2);
                    //var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
    $.post
            (
                    "../controller/cantidad.producto.leer.datos.controller.php",
                    {
                        p_cod_producto: cod_producto
                    }
            ).done(function (resultado) {
        var jsonResultado = resultado;
        if (jsonResultado.estado === 200) {
            cant = Math.round(jsonResultado.datos.cantidad);
            if(!cant){
                $(nomb).val("0");
                //document.getElementById(nomb2).style.display = 'none';
                //x.setAttribute("type", "hidden");
            }
                //$(nomb).val("0");
                //document.getElementById(nomb).disabled;
                
            else
                $(nomb).val(Math.round(jsonResultado.datos.cantidad));
        //this.p_cant_producto = jsonResultado.datos.cantidad;
        
        }
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}

function mostrar_cant_producto2(cod_producto, cont,) {// muestra la cantidad de un producto que ha registrado el cliente en su carrito de compras
                    var cad1 = "#textCantidadCliente1";
                    var nomb = cad1.concat(cont);
                    var cant = 0;
                    var cad2 = "textCantidadCliente1";
                    var nomb2 = cad2.concat(cont);
                    //var x = document.createElement(nomb2);
                    //var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
    $.post
            (
                    "../controller/cantidad.producto.leer.datos.controller.php",
                    {
                        p_cod_producto: cod_producto
                    }
            ).done(function (resultado) {
        var jsonResultado = resultado;
        if (jsonResultado.estado === 200) {
            cant = Math.round(jsonResultado.datos.cantidad);
            if(!cant){
                $(nomb).val("0");
                //document.getElementById(nomb2).style.display = 'none';
                //x.setAttribute("type", "hidden");
            }
                //$(nomb).val("0");
                //document.getElementById(nomb).disabled;
                
            else
                $(nomb).val(Math.round(jsonResultado.datos.cantidad));
        //this.p_cant_producto = jsonResultado.datos.cantidad;
        
        }
    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje, "error");
    });
}

function listar_mum_producto_carrito() { // Se muestra el número de productos que se encuentra en el carrito de compras.
    $.post
            (
                    "../controller/resumen.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {

                html += '<button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>'+ item.num_producto +'</span></button>';
            });
            $("#numProductos_carrito").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_carrito_resumen_producto() { // se lista el número total de productos y total de venta en el carrito, menú de arriba.
    $.post
            (
                    "../controller/resumen.carrito.listar.cabecera.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            //var p_precio_total;
            if(datosJSON.datos.length !== 0)
            {
                
            
                $.each(datosJSON.datos, function (i, item) {
                    let p_num_producto = Math.trunc(item.num_producto);
                    if(p_num_producto > 1)
                        html += '<h5 class="cart-inline-title"><b>En el carrito:</b><span> '+ p_num_producto +'</span>  unidades</h5>';
                    else
                        html += '<h5 class="cart-inline-title"><b>En el carrito:</b><span>'+ p_num_producto +'</span>   unidades</h5>';
                    if( item.p_precio_total == null)
                        html += '<h6 class="cart-inline-title"><b>Precio total:</b><span> S/. 0.00 </span></h6>';
                    else
                        html += '<h6 class="cart-inline-title"><b>Precio total + Igv:</b><span>  S/. '+ item.p_precio_total +'</span></h6>';
                    
                });
            }else
                html += '<h4 class="cart-inline-title text-center"><b>Tu carrito está vacío </b></h4>';
            $("#listarResumenCarrito").html(html);
            
        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_carrito_todos_productos_checkout() {
    $.post
            (
                    "../controller/producto.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

                html += '        <table class="table-custom table-cart">';
                html += '          <thead>';
                html += '            <tr>';
                html += '              <th>Nombre del producto</th>';
                html += '              <th>Precio</th>';
                html += '              <th>Cantidad</th>';
                html += '              <th>Total</th>';
                html += '              <th>Opción</th>';
                html += '            </tr>';
                html += '          </thead>';
                html += '          <tbody>';
            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                var p_total = item.cantidad * item.precio_venta;
                let total = dosDecimales(p_total);
                html += '            <tr>';
                html += '              <td><a class="table-cart-figure" href="single-product.html"><img src="https://lachuspita.pe/backend/_lib/file/img/productos/'+ item.id_producto +'.png" alt="" width="146" height="132"/></a><a class="table-cart-link" href="single-product.html">'+ item.descripcion +'</a></td>';
                html += '              <td>S/. '+ item.precio_venta +'</td>';
                html += '              <td>';
                html += '                <div class="">';
                html += '                  <input class="text-center" type="number" id="textCantidad_'+ i +'" data-zeros="true" value="'+ item.cantidad +'" min="1" max="1000">';
                html += '                </div>';
                html += '              </td>';
                html += '              <td>S/. '+ total +'</td>';
                html += '              <td>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="actualizarCantProducto3(' + item.id_producto + ', '+i+', '+ item.precio_venta +')"><ion-icon name="refresh-outline" size="small"></ion-icon></a>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="eliminar(' + item.id_producto + ')"><ion-icon name="trash-outline" size="small"></ion-icon></a>';
                html += '              </td>';
                html += '            </tr>';
                
            });
            
            html += '          </tbody>';
            html += '        </table>';

            $("#Listar_carrito_all_checkout").html(html);
            listar_totales_carrito_checkout();
            
        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listar_carrito_todos_productos() {
    $.post
            (
                    "../controller/producto.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

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
                var p_total = item.cantidad * item.precio_venta;
                let total = dosDecimales(p_total);
                html += '            <tr>';
                html += '              <td><a class="table-cart-figure" href="single-product.html"><img src="https://lachuspita.pe/backend/_lib/file/img/productos/'+ item.id_producto +'.png" alt="" width="146" height="132"/></a><a class="table-cart-link" href="single-product.html">'+ item.descripcion +'</a></td>';
                html += '              <td>S/. '+ item.precio_venta +'</td>';
                html += '              <td>';
                html += '                <div class="">';
                html += '                  <input class="text-center" type="number" id="textCantidad_'+ i +'" data-zeros="true" value="'+ item.cantidad +'" min="1" max="1000">';
                html += '                </div>';
                html += '              </td>';
                html += '              <td>S/. '+ total +'</td>';
                html += '              <td>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="actualizarCantProducto3(' + item.id_producto + ', '+i+', '+ item.precio_venta +')"><ion-icon name="refresh-outline" size="small"></ion-icon></a>';
                html += '                        <a class="btn btn-xs button-plomo button-plomo" href="#" onclick="eliminar(' + item.id_producto + ')"><ion-icon name="trash-outline" size="small"></ion-icon></a>';
                html += '              </td>';
                html += '            </tr>';
                
            });
            
            html += '          </tbody>';
            html += '        </table>';

            $("#Listar_carrito_all").html(html);
            listar_totales_carrito_checkout();
            
        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function actualizarCantProducto3(param_producto, cont, precio) { // agregó esta función solo por que el nombre del input es diferente
                    var cad1 = "textCantidad_";
                    var nomb = cad1.concat(cont);
                    var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
                    var cod_distrito = $("#cbDistrito").val();
                    $.post(
                            "../controller/carrito.compra.agregar.producto.controller.php",
                            {
                                p_param_producto: param_producto,
                                p_cant: cant

                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;
                        if (datosJSON.estado === 200) { //ok
                            listar_carrito_nombre_producto();
                            listar_carrito_resumen_producto();
                            listar_carrito_total_venta();
                            listar_carrito_todos_productos();
                            listar_carrito_todos_productos_checkout();
                            //listar_totales_carrito();
                            listar_totales_carrito_checkout();
                            if(cod_distrito !== "-")
                            listar_precio_envio(cod_distrito);
                            //ordenarPorPrecio();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
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
                            listar_carrito_todos_productos();
                            listar_carrito_todos_productos_checkout();
                            listar_carrito_total_venta();
                           //listar_carrito_nombre_producto();
                           //ordenarPorPrecio();
                           if(getParameterByName('id_sec'))
                            listarProductos(getParameterByName('id_sec'));
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
                            listar_carrito_total_venta();
                            listar_carrito_todos_productos();
                            listar_carrito_todos_productos_checkout();
                            listarProductos(getParameterByName('id'));
                            listarDescripcionProductos();
                            listar_totales_carrito_checkout();
                            //ordenarPorPrecio();
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}

$("#frmgrabarCarrito").submit(function (event) {// guarda el producto en el carrito
    event.preventDefault();

                    p_producto_param = $("#textProducto_id").val(),
                    p_cant= $("#textCan").val()

                    $.post(
                            "../controller/carrito.compra.agregar.producto.controller.php",
                            {
                                p_param_producto: $("#textProducto_id").val(),
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