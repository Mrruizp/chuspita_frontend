<?php

try {

    require_once '../logic/Usuario.class.php';
    require_once '../util/functions/Helper.class.php';
/*
   echo '<pre>';
echo 'Datos que llegan por POST';
print_r($_POST);
*/
    if
    (

            !isset($_POST["p_email"]) ||
            empty($_POST["p_email"]) 
   
    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }
    
     $p_correo         = $_POST["p_email"];

    $objUsuario= new Usuario();

    $resultado = $objUsuario->obtenerClave($p_correo);
    Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
