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
            empty($_POST["p_codigo_producto"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $codProducto = $_POST["p_codigo_producto"];
    
    $objProducto = new Producto();
    //$objProducto->setConsultorio_id($codProducto);
    $resultado = $objProducto->eliminar($codProducto);
    
    if ($resultado){
        Helper::imprimeJSON(200, "Se eliminó correctamente", "");
    }
    
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


