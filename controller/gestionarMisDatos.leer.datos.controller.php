<?php

try {
    require_once '../logic/misDatos.class.php';
    require_once '../util/functions/Helper.class.php';
    
    if 
        (
            !isset($_POST["p_codigo_MisDatos"]) ||
            empty($_POST["p_codigo_MisDatos"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $codCorreo = $_POST["p_codigo_MisDatos"];
    
    $objMisDatos = new misDatos();
    $resultado = $objMisDatos->leerDatos($codCorreo);
    
    Helper::imprimeJSON(200, "", $resultado);
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}


