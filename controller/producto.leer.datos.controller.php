<?php

require_once '../util/functions/Helper.class.php';
require_once '../logic/Producto.class.php';


//Haciendo lectura de la variable $_POST["dniUsuarioSesion"] que viene del archivo perfil.usuario.view.php
//$dni = $_POST["dniUsuarioSesion"];
$param = $_POST["p_param"];

try {
    $objProducto = new Producto();
    $resultado = $objProducto->LeerParamProducto($param);
    
Helper::imprimeJSON(200, "", $resultado);
    } catch (Exception $exc) {
        Helper::imprimeJSON(500, $exc->getMessage(), "");
    }

