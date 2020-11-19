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
    // datos personales

            
            !isset($_POST["p_cod_producto"]) ||
            empty($_POST["p_cod_producto"]) 

   
    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }

     $cod_producto   = $_POST["p_cod_producto"];


    $objProducto= new Producto();

    $resultado = $objProducto->listar_datos_envio_pedido($cod_producto);

        Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
