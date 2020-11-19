<?php

try {

    require_once '../logic/Carrito_compras.class.php';
    require_once '../util/functions/Helper.class.php';
/*
   echo '<pre>';
echo 'Datos que llegan por POST';
print_r($_POST);
*/

    if
    (
    // datos personales

            
            !isset($_POST["p_param_producto"]) ||
            empty($_POST["p_param_producto"]) ||

            !isset($_POST["p_cant"]) ||
            empty($_POST["p_cant"]) 

   
    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }

     $producto_param   = $_POST["p_param_producto"];
     $cant          = $_POST["p_cant"];


    $objCarrito_compras= new Carrito_compras();

    $resultado = $objCarrito_compras->agregar($producto_param, $cant);

        if ($resultado) {
            Helper::imprimeJSON(200, "Agregado correctamente", "");
        }
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
