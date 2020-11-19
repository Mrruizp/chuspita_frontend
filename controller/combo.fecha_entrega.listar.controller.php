<?php
try {
    require_once '../logic/comboCodigo.class.php';
    require_once '../util/functions/Helper.class.php';


    if 
        (
            !isset($_POST["fech_entrega"]) ||
            empty($_POST["fech_entrega"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $p_fech_entrega = $_POST["fech_entrega"];
    
    $objComboCodigo = new comboCodigo();
    $resultado = $objComboCodigo->cargarDatos_codigo_fecha_entrega($p_fech_entrega);
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

