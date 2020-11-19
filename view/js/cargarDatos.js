$(function() {
    //$(cbDistrito).scroll();
    listarLaCaserita();
    listarLaDulcera();
    listarLaRepostera();
    listarLimpiezaHogar();
    listarLimpiezaPersonal();
    listarTipoProducto();
    var param = 0; 
    param = getParameterByName('id')
    if(param)
    {
        listarProductos(param);
    }
   // listar_carrito_resumen_producto();
    //listar_carrito_nombre_producto();
    //listar_carrito_todos_productos(); // lista todos los productos que se encuentra en el carrito de compras y que pertenecen al cliente que inicia sesión.
    //listar_carrito_total_venta(); // lista el precio total del carrito de compra
   
});
/*
function listar_carrito_total_venta() {
    $.post
            (
                    "../controller/resumen.carrito.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {
               
               
                html += '        <h3 class="cart-product-price"><sup>S/.</sup>'+ item.precio_total +'</h3>';
                
                
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
                html += '              <th>Total</th>';
                html += '              <th>Opción</th>';
                html += '            </tr>';
                html += '          </thead>';
                html += '          <tbody>';
            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                html += '            <tr>';
                html += '              <td><a class="table-cart-figure" href="single-product.html"><img src="fotos/productos/'+ item.id_producto +'.png" alt="" width="146" height="132"/></a><a class="table-cart-link" href="single-product.html">'+ item.descripcion +'</a></td>';
                html += '              <td>S/. '+ item.precio_venta +'</td>';
                html += '              <td>';
                html += '                <div class="">';
                html += '                  <input class="text-center" type="number" id="textCantidad_'+ i +'" data-zeros="true" value="'+ item.cantidad +'" min="1" max="1000">';
                html += '                </div>';
                html += '              </td>';
                html += '              <td>S/. '+ item.total_venta +'</td>';
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
                html += '                      <input class="" style="width:90px" type="number" id="textCant'+ i +'" value = "0" data-zeros="true" min="1" max="1000">';
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
*/

function listarTipoProducto() { // Lista de todas las categorias con el número de productos registrados en la tabla producto: nombre tipo / número de productos de ese tipo
    $.post
            (
                    "../controller/producto.categoria.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            
            html += '<ul class="list list-shop-filter">';
            $.each(datosJSON.datos, function (i, item) {
                
            html += '    <li>';
            html += '          <a class="" href ="#" onclick="listarProductos_porTipo(' + item.id_tipo + ')">';
            html += '            '+item.descripcion_tipo+'';
            html += '          </a>';
            html += '          <span class="list-shop-filter-number">'+item.num_producto+'</span>';
            html += '    </li>';
            });
            html += '</ul>';

            $("#listarCategoria").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listarLaCaserita() {
    $.post
            (
                    "../controller/mostrarLaCaserita.menuPrincipal.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
           

                html += '';
                html += '  <div class="row row-30 justify-content-center">';
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".jpg";
               

                
                html += '    <div class="col-sm-6 col-md-12 col-lg-6">';
                html += '      <div class="oh-desktop">';
                
                html += '        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">';
                html += '          <div class="unit flex-row flex-lg-column">';
                html += '            <div class="unit-left">';
                html += '              <div class="product-figure"><img src="'+ cadena +'" alt="" style="width:270px; height:280px;"/>';
                html += '                <div class="product-button"><a class="button button-md button-white button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a></div>';
                html += '              </div>';
                html += '            </div>';
                html += '            <div class="unit-body">';
                html += '              <h6 class="product-title"><a href="#">'+ item.descripcion +'</a></h6>';
                html += '              <div class="product-price-wrap">';
                html += '                <!--<div class="product-price product-price-old">$59.00</div>-->';
                html += '                <div class="product-price">S/. '+ item.precio +'</div>';
                //html += '               <input type ="hidden" name = "textProductoId" id = "textProductoId" value="'+ item.id_producto +'">';
                html += '              </div><a class="button button-sm button-secondary button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a>';
                html += '            </div>';
                html += '          </div>';
                html += '        </article>';
                html += '      </div>';
                html += '    </div>';
                    
                
            });

            html += '  </div>';
            

            $("#listado").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listarLaDulcera() {
    $.post
            (
                    "../controller/mostrarLaDulcera.menuPrincipal.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
           

                html += '';
                html += '  <div class="row row-30 justify-content-center">';
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".jpeg";
               

                
                html += '    <div class="col-sm-6 col-md-12 col-lg-6">';
                html += '      <div class="oh-desktop">';
                
                html += '        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">';
                html += '          <div class="unit flex-row flex-lg-column">';
                html += '            <div class="unit-left">';
                html += '              <div class="product-figure"><img src="'+ cadena +'" alt="" style="width:270px; height:280px;"/>';
                html += '                <div class="product-button"><a class="button button-md button-white button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a></div>';
                html += '              </div>';
                html += '            </div>';
                html += '            <div class="unit-body">';
                html += '              <h6 class="product-title"><a href="#">'+ item.descripcion +'</a></h6>';
                html += '              <div class="product-price-wrap">';
                html += '                <!--<div class="product-price product-price-old">$59.00</div>-->';
                html += '                <div class="product-price">S/. '+ item.precio +'</div>';
                //html += '               <input type ="hidden" name = "textProductoId" id = "textProductoId" value="'+ item.id_producto +'">';
                html += '              </div><a class="button button-sm button-secondary button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a>';
                html += '            </div>';
                html += '          </div>';
                html += '        </article>';
                html += '      </div>';
                html += '    </div>';
                    
                
            });

            html += '  </div>';
            

            $("#listadoLaDulcera").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listarLaRepostera() {
    $.post
            (
                    "../controller/mostrarLaRepostera.menuPrincipal.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
           

                html += '';
                html += '  <div class="row row-30 justify-content-center">';
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
               

                
                html += '    <div class="col-sm-6 col-md-12 col-lg-6">';
                html += '      <div class="oh-desktop">';
                
                html += '        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">';
                html += '          <div class="unit flex-row flex-lg-column">';
                html += '            <div class="unit-left">';
                html += '              <div class="product-figure"><img src="'+ cadena +'" alt="" style="width:270px; height:280px;"/>';
                html += '                <div class="product-button"><a class="button button-md button-white button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a></div>';
                html += '              </div>';
                html += '            </div>';
                html += '            <div class="unit-body">';
                html += '              <h6 class="product-title"><a href="#">'+ item.descripcion +'</a></h6>';
                html += '              <div class="product-price-wrap">';
                html += '                <!--<div class="product-price product-price-old">$59.00</div>-->';
                html += '                <div class="product-price">S/. '+ item.precio +'</div>';
                //html += '               <input type ="hidden" name = "textProductoId" id = "textProductoId" value="'+ item.id_producto +'">';
                html += '              </div><a class="button button-sm button-secondary button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a>';
                html += '            </div>';
                html += '          </div>';
                html += '        </article>';
                html += '      </div>';
                html += '    </div>';
                    
                
            });

            html += '  </div>';
            

            $("#listadoLaRepostera").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listarLimpiezaHogar() {
    $.post
            (
                    "../controller/mostrarLimpiezaHogar.menuPrincipal.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
           //var cod_producto = "";

                html += '';
                html += '  <div class="row row-30 justify-content-center">';
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
               

                
                html += '    <div class="col-sm-6 col-md-12 col-lg-6">';
                html += '      <div class="oh-desktop">';
                
                html += '        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">';
                html += '          <div class="unit flex-row flex-lg-column">';
                html += '            <div class="unit-left">';
                html += '              <div class="product-figure"><img src="'+ cadena +'" alt="" style="width:270px; height:280px;"/>';
                html += '                <div class="product-button"><a class="button button-md button-white button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a></div>';
                html += '              </div>';
                html += '            </div>';
                html += '            <div class="unit-body">';
                html += '              <h6 class="product-title"><a href="#">'+ item.descripcion +'</a></h6>';
                html += '              <div class="product-price-wrap">';
                html += '                <!--<div class="product-price product-price-old">$59.00</div>-->';
                html += '                <div class="product-price">S/. '+ item.precio +'</div>';
                //html += '               <input type ="hidden" name = "textProductoId" id = "textProductoId" value="'+ item.id_producto +'">';
                html += '              </div><a class="button button-sm button-secondary button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a>';
                html += '            </div>';
                html += '          </div>';
                html += '        </article>';
                html += '      </div>';
                html += '    </div>';
                    
                
            });

            html += '  </div>';
            

            $("#listadoLimpiezaHogar").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listarLimpiezaPersonal() {
    $.post
            (
                    "../controller/mostrarLimpiezaPersonal.menuPrincipal.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";
           

                html += '';
                html += '  <div class="row row-30 justify-content-center">';
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
               

                
                html += '    <div class="col-sm-6 col-md-12 col-lg-6">';
                html += '      <div class="oh-desktop">';
                
                html += '        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">';
                html += '          <div class="unit flex-row flex-lg-column">';
                html += '            <div class="unit-left">';
                html += '              <div class="product-figure"><img src="'+ cadena +'" alt="" style="width:270px; height:280px;"/>';
                html += '                <div class="product-button"><a class="button button-md button-white button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a></div>';
                html += '              </div>';
                html += '            </div>';
                html += '            <div class="unit-body">';
                html += '              <h6 class="product-title"><a href="#">'+ item.descripcion +'</a></h6>';
                html += '              <div class="product-price-wrap">';
                html += '                <!--<div class="product-price product-price-old">$59.00</div>-->';
                html += '                <div class="product-price">S/. '+ item.precio +'</div>';
                //html += '               <input type ="hidden" name = "textProductoId" id = "textProductoId" value="'+ item.id_producto +'">';
                html += '              </div><a class="button button-sm button-secondary button-ujarak" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">Agregar a carrito</a>';
                html += '            </div>';
                html += '          </div>';
                html += '        </article>';
                html += '      </div>';
                html += '    </div>';
                    
                
            });

            html += '  </div>';
            

            $("#listadoLimpiezaPersonal").html(html);

        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function redireccionar(email) {
            
    $.post
            (
                    location.href = "productos.agregar.carrito.view.php?id="+ item.prueba_id +""
            )
}

function listarProductos_porTipo(p_tipo_id) {
    mostrarListarProductos_tipo();
    $.post
            (
                    "../controller/mostrarProductosCategoria.listar.controller.php",
                    {
                        p_id_tipo : p_tipo_id
                    }

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";

           
            html += '<table class="table-custom table-cart">';
            html += '  <thead>';
            html += '    <tr style="background-color:#ff4a4a;">';
            html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> Búsqueda: Perecibles</th>';
            html += '      <th class="text-white"></th>';
            html += '      <th class="text-white"></th>';
            html += '    </tr>';
            html += '  </thead>';
            html += ' <tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
                html += '<tr>';
                html += ' <td>';
                html += '  <a class="table-cart-figure" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">';
                html += '   <img src="'+ cadena +'" alt="" style="width:146px; height:132px;"/>';
                html += '  </a>';
                html += '  <a class="table-cart-link" href="#">'+ item.descripcion +'</a>';
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
                
                html += '  </div><br/>';
                html += '  <div class="form-button">';
                html += '    <button class="button button-primary button-pipaluk button-md" onclick="actualizarCantProducto2(' + item.id_producto + ', '+i+', '+ item.precio +')">AGREGAR</button>';
                html += '  </div>';
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';

            $("#listaTipoProducto").html(html);


        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });
}

function listarProductos() {
    mostrarListarProductos();
    $.post
            (
                    "../controller/productos.listar.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";

           
            html += '<table class="table-custom table-cart">';
            html += '  <thead>';
            html += '    <tr style="background-color:#ff4a4a;">';
            html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> Búsqueda: Perecibles</th>';
            html += '      <th class="text-white"></th>';
            html += '      <th class="text-white"></th>';
            html += '    </tr>';
            html += '  </thead>';
            html += ' <tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
                html += '<tr>';
                html += ' <td>';
                html += '  <a class="table-cart-figure" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">';
                html += '   <img src="'+ cadena +'" alt="" style="width:146px; height:132px;"/>';
                html += '  </a>';
                html += '  <a class="table-cart-link" href="#">'+ item.descripcion +'</a>';
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

function actualizarCantProducto2(param_producto, cont, precio) {
                    var cad1 = "textCantidad";
                    var nomb = cad1.concat(cont);
                    var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
                    
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
                            listarProductos(getParameterByName('id'));
                            listarDescripcionProductos();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}
function actualizarCantProducto22(p_param_producto, cont, precio) {
                    var cad1 = "textCantidad1";
                    var nomb = cad1.concat(cont);
                    var cant = document.getElementById(nomb).value; // permite llamar a los id de los inputs y agregar su valor.
                    
                    $.post(
                            "../controller/carrito.compra.agregar.producto.controller.php",
                            {
                                p_param_producto: p_param_producto,
                                p_cant: cant

                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;
                        if (datosJSON.estado === 200) { //ok
                            listar_carrito_nombre_producto();
                            listar_carrito_resumen_producto();
                            listar_carrito_total_venta();
                            listar_carrito_todos_productos();
                            listarProductos(getParameterByName('id'));
                            listarDescripcionProductos();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}

function ordenarPorPrecio() {
                    ocultarListarPrecioProductos();
                    ordenar_producto = $("#ordenarMayorMenorPrecio").val()
                    if(ordenar_producto == "Ordenar:")
                        ordenar_producto = 1;
                    var p_id_seccion = "";

                    p_id_seccion = getParameterByName('id');
                    $.post(
                            "../controller/buscarPorMayorMenorProductos.listar.controller.php",
                            {
                                p_ordenar_producto: ordenar_producto,
                                id_seccion : p_id_seccion

                            }
                    ).done(function (resultado) {
                        var datosJSON = resultado;
                        if (datosJSON.estado === 200) {
            var html = "";
            var cadena = "";

           
            html += '<table class="table-custom table-cart">';
            html += '  <thead>';
            html += '    <tr style="background-color:#ff4a4a;">';
            html += '      <th class="text-white"><ion-icon name="search-outline"></ion-icon> Búsqueda: Perecibles</th>';
            html += '      <th class="text-white"></th>';
            html += '      <th class="text-white"></th>';
            html += '    </tr>';
            html += '  </thead>';
            html += ' <tbody>';

            //Detalle
            $.each(datosJSON.datos, function (i, item) {
               
                cadena = "https://lachuspita.pe/backend/_lib/file/img/productos/" + item.id_producto + ".png";
                html += '<tr>';
                html += ' <td>';
                html += '  <a class="table-cart-figure" href="productos.agregar.carrito.view.php?id='+ item.id_producto +'">';
                html += '   <img src="'+ cadena +'" alt="" style="width:146px; height:132px;"/>';
                html += '  </a>';
                html += '  <p>'+ item.descripcion +'</p>';
                html += ' </td>';
                

                html += '<td>S/. '+ item.precio +'</td>';
                html += '<td>';
                html += '  <div class="table-cart-stepper">';
                html += '    <input type="number" class= "text-center" id="textCantidad111'+ i +'" data-zeros="true" value="1" min="1" max="100">';
                 if(item.cantidad)
                {
                    if(item.cantidad == 1)
                        html += '<small class = "text-primary"><b>'+ Math.round(item.cantidad) +'</b> en carrito</small>';
                    else
                        html += '<small class = "text-primary"><b>'+ Math.round(item.cantidad) +'</b> en carrito</small>';
                }
                
                html += '  </div><br/>';
                html += '  <div class="form-button">';
                html += '    <button class="button button-primary button-pipaluk button-md" onclick="actualizarCantProducto222(' + item.id_producto + ', '+i+', '+ item.precio +')">AGREGAR</button>';
                html += '  </div>';
                html += '</td>';
                html += '</tr>';
            });

            html += '</tbody>';
            html += '</table>';

            $("#listaMayorMenorPrecioProductos").html(html);


        } else {
            swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        swal("Error", datosJSON.mensaje , "error"); 
    });

              
}

function actualizarCantProducto222(codProducto, cont, precio) { // 
                    var cad1 = "textCantidad111";
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
                            //listarProductos();
                            //listarDescripcionProductos();
                            ordenarPorPrecio();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
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
                html += '                      <input class="" style="width:90px" type="number" id="textCant'+ i +'" value = "0" data-zeros="true" min="1" max="1000">';
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
                            listar_carrito_total_venta();
                            listar_carrito_todos_productos();
                            listarProductos();
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
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
                            alertify.success("<p class = 'text-white'>Producto agregado al carrito</p>");
                            //swal("Exito", datosJSON.mensaje, "success");
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
                            listar_carrito_todos_productos();
                            listar_carrito_total_venta();
                            //swal("Exito", datosJSON.mensaje, "success");
                        }

                    }).fail(function (error) {
                        var datosJSON = $.parseJSON(error.responseText);
                        swal("Error", datosJSON.mensaje, "error");
                    });

              

}
*/