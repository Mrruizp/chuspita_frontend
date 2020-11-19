<?php

try {

    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';
/*
   echo '<pre>';
echo 'Datos que llegan por POST';
print_r($_POST);
*/


    $objProducto= new Producto();

    $resultado = $objProducto->listar_productos_resumen_carrito_precio_total();

        Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
