<?php

try {
    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';
    
 
/*
    if 
        (
            !isset($_POST["p_desProducto"]) ||
            empty($_POST["p_desProducto"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    */
   
    $des_producto = $_POST["p_desProducto"];
    
    $objProducto = new Producto();
    $resultado = $objProducto->listar_productosPorDescripcion($des_producto);
    
    Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


