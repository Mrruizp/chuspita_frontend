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

            
            !isset($_POST["p_cod_distrito"]) ||
            empty($_POST["p_cod_distrito"]) 

   
    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }

     $cod_distrito   = $_POST["p_cod_distrito"];


    $objProducto= new Producto();

    $resultado = $objProducto->listar_precio_envio_pedido($cod_distrito);

        Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
