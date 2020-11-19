<?php

require_once '../logic/Producto.class.php';
require_once '../util/functions/Helper.class.php';

try {
    $objProducto = new Producto();
    $resultado = $objProducto->listar_productos_resumen_totales();
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

