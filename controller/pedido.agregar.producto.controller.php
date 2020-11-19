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

            
            !isset($_POST["p_cod_distrito"]) ||
            empty($_POST["p_cod_distrito"]) ||

            !isset($_POST["p_dir_entrega"]) ||
            empty($_POST["p_dir_entrega"]) ||

            !isset($_POST["p_ref_entrega"]) ||
            empty($_POST["p_ref_entrega"]) ||

            !isset($_POST["p_obs"]) ||
            empty($_POST["p_obs"])  ||

            !isset($_POST["p_num_doc"]) ||
            empty($_POST["p_num_doc"])  ||

            !isset($_POST["p_tipo_pago"]) ||
            empty($_POST["p_tipo_pago"])  ||

            !isset($_POST["p_fecha_entrega"]) ||
            empty($_POST["p_fecha_entrega"]) ||

            !isset($_POST["p_ruc"]) ||
            empty($_POST["p_ruc"])  ||
            
            !isset($_POST["p_razon_social"]) ||
            empty($_POST["p_razon_social"])  ||
            
            !isset($_POST["p_recibo"]) ||
            empty($_POST["p_recibo"])  

   
    ) {
        Helper::imprimeJSON(500, "Falta completar datos", "");
        exit();
    }

     $cod_distrito   = $_POST["p_cod_distrito"];
     $dir_entrega    = $_POST["p_dir_entrega"];
     $ref_entrega    = $_POST["p_ref_entrega"];
     $obs            = $_POST["p_obs"];
     $num_doc        = $_POST["p_num_doc"];
     $tipo_pago      = $_POST["p_tipo_pago"];
     $fecha_entrega  = $_POST["p_fecha_entrega"];
     $ruc            = $_POST["p_ruc"];
     $razon_social   = $_POST["p_razon_social"];
     $recibo         = $_POST["p_recibo"];


    $objCarrito_compras= new Carrito_compras();

    $resultado = $objCarrito_compras->agregar_pedido($cod_distrito, $dir_entrega, $ref_entrega, $obs, $tipo_pago, $num_doc, $fecha_entrega, $recibo, $ruc, $razon_social);

        if ($resultado) {
            Helper::imprimeJSON(200, "Agregado correctamente", "");
        }
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
