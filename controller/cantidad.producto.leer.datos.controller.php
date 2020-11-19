<?php

try {
    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';
    
    if 
        (
            !isset($_POST["p_cod_producto"]) ||
            empty($_POST["p_cod_producto"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $cod_producto = $_POST["p_cod_producto"];
    
    $objProducto = new Producto();
    $resultado = $objProducto->leer_cant_producto($cod_producto);
    
    Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


