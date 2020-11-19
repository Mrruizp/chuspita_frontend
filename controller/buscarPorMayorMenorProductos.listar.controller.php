<?php

try {
    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';
    
    

    
    
    $ordenar_producto = $_POST["p_ordenar_producto"];
    $p_id_seccion = $_POST["id_seccion"];
    
    $objProducto = new Producto();
    $resultado = $objProducto->listar_productosMayorMenor($ordenar_producto, $p_id_seccion);
    
    Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


