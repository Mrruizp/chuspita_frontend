<?php

require_once '../logic/Producto.class.php';
require_once '../util/functions/Helper.class.php';

try {

	if 
        (
            !isset($_POST["p_idpedido"]) ||
            empty($_POST["p_idpedido"])
            
        )
    {
            Helper::imprimeJSON(500, "Falta completar datos", "");
            exit();
    }
    
    $codpedido = $_POST["p_idpedido"];

    $objProducto = new Producto();
    $resultado = $objProducto->listar_mis_productos_pedido($codpedido);
    Helper::imprimeJSON(200, "", $resultado);
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}

