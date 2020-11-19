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

            
            !isset($_POST["p_cod_pedido"]) ||
            empty($_POST["p_cod_pedido"]) 

   
    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }

     $cod_pedido   = $_POST["p_cod_pedido"];


    $objProducto= new Producto();

    $resultado = $objProducto->listar_subtotal_envio_total_pedido($cod_pedido);

        Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
