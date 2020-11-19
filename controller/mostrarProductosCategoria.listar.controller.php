<?php

try {
    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';
    
    if 
        (
            !isset($_POST["p_id_tipo"]) ||
            empty($_POST["p_id_tipo"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $tipoid = $_POST["p_id_tipo"];
    
    $objProducto = new Producto();
    $resultado = $objProducto->listar_productosPorCategoria($tipoid);
    
    Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


