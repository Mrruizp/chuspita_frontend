
$(document).ready(function () {
    //var links = document.getElementsByTagName("../../util/css/style.css"); for (var x in links) { var link = links[x]; if (link.getAttribute("type").indexOf("css") > -1) { link.href = link.href + "?id=" + new Date().getMilliseconds(); } }
   // var links = document.getElementsByTagName("../util/css/bootstrap.css"); for (var x in links) { var link = links[x]; if (link.getAttribute("type").indexOf("css") > -1) { link.href = link.href + "?id=" + new Date().getMilliseconds(); } }

   

    listar();

});


function listar() {
    $.post
            (
                    "../controller/bebidas.listar.productos.bebidas.view.controller.php"

                    ).done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
            var html = "";

            $.each(datosJSON.datos, function (i, item) {
                
                //html += '<a class="table-cart-link" href="single-product.html">'+ item.id_marca +'</a>';
               
                html += '<td>';
                html += '<a class="table-cart-figure" href="single-product.html"><img src="../util/images/product-mini-7-146x132.jpg" alt="" width="146" height="132"/></a>';
                html += '<a class="table-cart-link" href="single-product.html">'+ item.descripcion +'</a>';
                
                html += '</td>';                
                html += '<td>S/.'+ item.precio +'</td>';
                html += '<td>';
                html += '<div class="table-cart-stepper">';
                html += '<input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">';
                html += '</div>';
                html += '<div class="form-button">';
                html += '<button class="button button-primary button-pipaluk button-md" type="submit">AGREGAR</button>';
                html += '</div>';
                html += '</td>';

                
            });

            
            $("#listado").html(html);

        } else {
            //swal("Mensaje del sistema", resultado , "warning");
        }

    }).fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
        //swal("Error", datosJSON.mensaje , "error"); 
    });
}
