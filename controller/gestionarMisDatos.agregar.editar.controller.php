<?php

try {

    require_once '../logic/misDatos.class.php';
    require_once '../util/functions/Helper.class.php';
/*
   echo '<pre>';
echo 'Datos que llegan por POST';
print_r($_POST);
*/
    if
    (
    // datos personales

            !isset($_POST["p_tipo_cliente"]) ||
            empty($_POST["p_tipo_cliente"]) ||

            !isset($_POST["p_tipo_doc_dp"]) ||
            empty($_POST["p_tipo_doc_dp"]) ||

            !isset($_POST["p_nun_doc_dp"]) ||
            empty($_POST["p_nun_doc_dp"]) ||

            !isset($_POST["p_nombres_dp"]) ||
            empty($_POST["p_nombres_dp"]) ||

            !isset($_POST["p_nombres_comercial"]) ||
            empty($_POST["p_nombres_comercial"]) ||

            //!isset($_POST["p_apellidos_dp"]) ||
            //empty($_POST["p_apellidos_dp"]) ||

            

            !isset($_POST["p_tel_fijo_dp"]) ||
            empty($_POST["p_tel_fijo_dp"]) ||

            !isset($_POST["p_tel_celular_dp"]) ||
            empty($_POST["p_tel_celular_dp"]) ||

            !isset($_POST["p_fec_nacimiento_dp"]) ||
            empty($_POST["p_fec_nacimiento_dp"]) ||
        
            !isset($_POST["p_departamento_dp"]) ||
            empty($_POST["p_departamento_dp"]) ||

            !isset($_POST["p_provincia_dp"]) ||
            empty($_POST["p_provincia_dp"]) ||
        
            !isset($_POST["p_distrito_dp"]) ||
            empty($_POST["p_distrito_dp"]) ||

            !isset($_POST["p_direccion_dp"]) ||
            empty($_POST["p_direccion_dp"]) 

   
    ) {
        //Helper::imprimeJSON(500, "Falta completar datos", "");
       // exit();
    }
//datos personales
     $tipo_cliente         = $_POST["p_tipo_cliente"];
     $tipo_doc_dp          = $_POST["p_tipo_doc_dp"];
     $nun_doc_dp           = $_POST["p_nun_doc_dp"];
     $nombres_dp           = $_POST["p_nombres_dp"];
     $p_nombres_comercial  = $_POST["p_nombres_comercial"];
     
     $tel_fijo_dp          = $_POST["p_tel_fijo_dp"];
     $tel_celular_dp       = $_POST["p_tel_celular_dp"];
     $fec_nacimiento_dp    = $_POST["p_fec_nacimiento_dp"];
     $departamento_dp      = $_POST["p_departamento_dp"];
     $provincia_dp         = $_POST["p_provincia_dp"];
     $distrito_dp          = $_POST["p_distrito_dp"];
     $direccion_dp         = $_POST["p_direccion_dp"];

//datos empresa
     /*
     $razon_social_de    = $_POST["p_razon_social_de"];
     $ruc_de             = $_POST["p_ruc_de"];
     $tel_fijo_de        = $_POST["p_tel_fijo_de"];
     $tel_celular_de     = $_POST["p_tel_celular_de"];
     */
     //$tipoOperacion = $_POST["p_tipo_ope"];

    $objMisDatos= new misDatos();

  
        if (
                !isset($_POST["p_codigo_MisDatos"]) ||
                empty($_POST["p_codigo_MisDatos"])
        ) {
            Helper::imprimeJSON(500, "Falta completar datos para editar", "");
            exit();
        }

        $codigo_correo = $_POST["p_codigo_MisDatos"];
        
        //datos personales
        $objMisDatos->setTipo_cliente($tipo_cliente);
        $objMisDatos->setTipo_doc_dp($tipo_doc_dp);
        $objMisDatos->setNumero_doc_dp($nun_doc_dp);
        $objMisDatos->setNombres_dp($nombres_dp);
        $objMisDatos->setNombre_comercial($p_nombres_comercial);
        
        $objMisDatos->setTelefono_fijo_dp($tel_fijo_dp);
        $objMisDatos->setTelefono_celular_dp($tel_celular_dp);
        $objMisDatos->setFecha_nacimiento_dp($fec_nacimiento_dp);
        $objMisDatos->setDepartamento_dp($departamento_dp);
        $objMisDatos->setProvincia_dp($provincia_dp);
        $objMisDatos->setDistrito_dp($distrito_dp);
        $objMisDatos->setDireccion_dp($direccion_dp);
//datos empresa
        /*
        $objMisDatos->setRazon_social_de($razon_social_de);
        $objMisDatos->setRuc_de($ruc_de);
        $objMisDatos->setTelefono_fijo_de($tel_fijo_de);
        $objMisDatos->setTelefono_celular_de($tel_celular_de);
    */
        $resultado = $objMisDatos->editar($codigo_correo, $departamento_dp, $provincia_dp, $distrito_dp);
        if ($resultado) {
            Helper::imprimeJSON(200, "Agregado correctamente", "");
        }
    
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
