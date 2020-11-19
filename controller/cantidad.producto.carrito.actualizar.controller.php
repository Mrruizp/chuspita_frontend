<?php

try {
    require_once '../logic/Producto.class.php';
    require_once '../util/functions/Helper.class.php';
  /*  
    echo '<pre>';
    echo 'Datos que llegan por POST';
    print_r($_POST);
*/
    if 
        (
            !isset($_POST["p_codigo_producto"]) ||
            empty($_POST["p_codigo_producto"]) ||

            !isset($_POST["p_cant"]) ||
            empty($_POST["p_cant"]) ||

            !isset($_POST["p_precio"]) ||
            empty($_POST["p_precio"]) 
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $codProducto = $_POST["p_codigo_producto"];
    $cant = $_POST["p_cant"];
    //$precio = $_POST["p_precio"];
    
    $objProducto = new Producto();
    //$objProducto->setConsultorio_id($codProducto);
    $resultado = $objProducto->actualizarCantProducto($codProducto, $cant);
    
    if ($resultado){
        Helper::imprimeJSON(200, "Se actualizó correctamente", "");
    }
    
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


