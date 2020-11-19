<?php

require_once '../logic/Producto.class.php';
require_once '../util/functions/Helper.class.php';

/*
echo '<pre>';
echo 'Datos que llegan por POST';
print_r($_POST);
*/
try {

	if 
        (
            !isset($_POST["id_seccion"]) ||
            empty($_POST["id_seccion"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $idseccion = $_POST["id_seccion"];

    $objProducto = new Producto();
    $resultado = $objProducto->listar_productos($idseccion);
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

