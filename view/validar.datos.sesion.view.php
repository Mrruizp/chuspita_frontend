<?php

require_once '../util/functions/Helper.class.php';

session_name("La_chuspita_cliente");
session_start();



if (!isset($_SESSION["s_email"])) {
    //No inició sesión
    Helper::mensaje("Usted no ha iniciado sesión", "e", "index.php", 5);
    exit();
}


//Si ha iniciado sesiòn, entonces se carga en 2 variables los datos del usuario (nombre y el cargo)
//$nombreUsuario = ucwords(strtolower($_SESSION["s_usuario"]));
//$s_cargo = $_SESSION["cargo"];
//$s_codigoUsuario = $_SESSION["codigo_usuario"];
//$s_codigoCargo = $_SESSION["cargo_id"];
$email = $_SESSION["s_email"];

//$s_nombreUsuario = $_SESSION["s_usuario"];
/*
  if (file_exists("fotos/" . $foto . ".jpg" )){
  $fotoUsuario = $foto . ".jpg";
  }else */
$emailSesion = $_SESSION["s_email"];
$foto = $emailSesion;
//$foto = $_SESSION["s_doc_id"];
if (file_exists("fotos/" . $foto . ".png")) {
    $fotoUsuario = $foto . ".png";
} else {
    $fotoUsuario = "default-user-image.png";
}



//echo $dniSesion;

//$codigoUsuarioSesion = $_SESSION["s_codigo_usuario"];
