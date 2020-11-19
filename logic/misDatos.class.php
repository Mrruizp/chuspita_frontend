<?php

require_once '../data/Conexion.class.php';
session_name("La_chuspita_cliente");
session_start();

class misDatos extends Conexion {

// datos personales
    private $Tipo_cliente;
    private $Nombres_dp;
    private $Nombre_comercial;
    private $Tipo_doc_dp;
    private $Numero_doc_dp;
    private $Telefono_fijo_dp;
    private $Telefono_celular_dp;
    private $Fecha_nacimiento_dp;
    private $Departamento_dp;
    private $Provincia_dp;
    private $Distrito_dp;
    private $Direccion_dp;

//datos empresas
    private $Razon_social_de;
    private $Ruc_de;
    private $Departamento_de;
    private $Provincia_de;
    private $Distrito_de;
    private $Direccion_de;
    private $Telefono_fijo_de;
    private $Telefono_celular_de;


    public function getTipo_cliente() {
        return $this->Tipo_cliente;
    }

    public function getNombres_dp() {
        return $this->Nombres_dp;
    }

    public function getNombre_comercial() {
        return $this->Nombre_comercial;
    }

    public function getTipo_doc_dp() {
        return $this->Tipo_doc_dp;
    }

    public function getNumero_doc_dp() {
        return $this->Numero_doc_dp;
    }

    public function getTelefono_fijo_dp() {
        return $this->Telefono_fijo_dp;
    }

    public function getTelefono_celular_dp() {
        return $this->Telefono_celular_dp;
    }

    public function getFecha_nacimiento_dp() {
        return $this->Fecha_nacimiento_dp;
    }

    public function getDepartamento_dp() {
        return $this->Departamento_dp;
    }

    public function getProvincia_dp() {
        return $this->Provincia_dp;
    }

    public function getDistrito_dp() {
        return $this->Distrito_dp;
    }

    public function getDireccion_dp() {
        return $this->Direccion_dp;
    }

    public function getRazon_social_de() {
        return $this->Razon_social_de;
    }

    public function getRuc_de() {
        return $this->Ruc_de;
    }

    public function getDepartamento_de() {
        return $this->Departamento_de;
    }

    public function getProvincia_de() {
        return $this->Provincia_de;
    }

    public function getDistrito_de() {
        return $this->Distrito_de;
    }

    public function getDireccion_de() {
        return $this->Direccion_de;
    }


    public function getTelefono_fijo_de() {
        return $this->Telefono_fijo_de;
    }

    public function getTelefono_celular_de() {
        return $this->Telefono_celular_de;
    }

    public function setTipo_cliente($Tipo_cliente) {
        $this->Tipo_cliente = $Tipo_cliente;
    }

    public function setNombres_dp($Nombres_dp) {
        $this->Nombres_dp = $Nombres_dp;
    }

    public function setNombre_comercial($Nombre_comercial) {
        $this->Nombre_comercial = $Nombre_comercial;
    }

    public function setTipo_doc_dp($Tipo_doc_dp) {
        $this->Tipo_doc_dp = $Tipo_doc_dp;
    }

    public function setNumero_doc_dp($Numero_doc_dp) {
        $this->Numero_doc_dp = $Numero_doc_dp;
    }

    public function setTelefono_fijo_dp($Telefono_fijo_dp) {
        $this->Telefono_fijo_dp = $Telefono_fijo_dp;
    }

    public function setTelefono_celular_dp($Telefono_celular_dp) {
        $this->Telefono_celular_dp = $Telefono_celular_dp;
    }

    public function setFecha_nacimiento_dp($Fecha_nacimiento_dp) {
        $this->Fecha_nacimiento_dp = $Fecha_nacimiento_dp;
    }

    public function setDepartamento_dp($Departamento_dp) {
        $this->Departamento_dp = $Departamento_dp;
    }

    public function setProvincia_dp($Provincia_dp) {
        $this->Provincia_dp = $Provincia_dp;
    }

    public function setDistrito_dp($Distrito_dp) {
        $this->Distrito_dp = $Distrito_dp;
    }

    public function setDireccion_dp($Direccion_dp) {
        $this->Direccion_dp = $Direccion_dp;
    }


    public function setRazon_social_de($Razon_social_de) {
        $this->Razon_social_de = $Razon_social_de;
    }

    public function setRuc_de($Ruc_de) {
        $this->Ruc_de = $Ruc_de;
    }

    public function setDepartamento_de($Departamento_de) {
        $this->Departamento_de = $Departamento_de;
    }

    public function setProvincia_de($Provincia_de) {
        $this->Provincia_de = $Provincia_de;
    }

    public function setDistrito_de($Distrito_de) {
        $this->Distrito_de = $Distrito_de;
    }

    public function setDireccion_de($Direccion_de) {
        $this->Direccion_de = $Direccion_de;
    }

    public function setTelefono_fijo_de($Telefono_fijo_de) {
        $this->Telefono_fijo_de = $Telefono_fijo_de;
    }

    public function setTelefono_celular_de($Telefono_celular_de) {
        $this->Telefono_celular_de = $Telefono_celular_de;
    }


    public function editar($p_codigo_correo, $p_departamento_dp, $p_provincia_dp, $p_distrito_dp) {
        try {
            $sql = " 
                    update cliente
                    set 
                         tipo_cliente     = :p_tipo_cliente,
                         tipo_documento   = :p_tipo_documento,
                         nro_documento    = :p_nro_documento,
                         nombre           = :p_nombre,
                         nombre_comercial = :p_nombre_comercial,
                         telefono_fijo    = :p_telefono_fijo,
                         telefono_celular = :p_telefono_celular,
                         fecha_nacimiento = :p_fecha_nacimiento,
                         direccion        = :p_direccion,
                         cod_region       = '$p_departamento_dp',
                         cod_provincia    = '$p_provincia_dp',
                         cod_distrito     = '$p_distrito_dp'
                    where
                        correo = '$p_codigo_correo';
                
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_tipo_cliente", $this->getTipo_cliente());
            $sentencia->bindParam(":p_tipo_documento", $this->getTipo_doc_dp());
            $sentencia->bindParam(":p_nro_documento", $this->getNumero_doc_dp());
            $sentencia->bindParam(":p_nombre", $this->getNombres_dp());
            $sentencia->bindParam(":p_nombre_comercial", $this->getNombre_comercial());
            $sentencia->bindParam(":p_telefono_fijo", $this->getTelefono_fijo_dp());
            $sentencia->bindParam(":p_telefono_celular", $this->getTelefono_celular_dp());
            $sentencia->bindParam(":p_fecha_nacimiento", $this->getFecha_nacimiento_dp());
            $sentencia->bindParam(":p_direccion", $this->getDireccion_dp());
            //$sentencia->bindParam(":p_cod_region", $this->getDepartamento_dp());
            //$sentencia->bindParam(":p_cod_provincia", $this->getProvincia_dp());
            //$sentencia->bindParam(":p_cod_distrito", $this->getDistrito_dp());
            $sentencia->execute();
            
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }

    public function leerDatos($p_codCorreo) {
        try {
            $sql = "
                    select
                         c.tipo_cliente,
                         c.tipo_documento,
                         c.nro_documento,
                         c.nombre,
                         c.nombre_comercial,
                         c.telefono_fijo,
                         c.telefono_celular,
                         c.fecha_nacimiento,
                         c.direccion,
                         d.cod_distrito,
                         p.cod_provincia,
                         r.cod_region,
                         d.descripcion as nom_distrito,
                         p.descripcion as nom_provincia,
                         r.descripcion as nom_region
                    from 
                        cliente c inner join distrito d
                    on
                        c.cod_distrito = d.cod_distrito inner join provincia p
                    on
                        d.cod_provincia = p.cod_provincia inner join region r
                    on
                        p.cod_region = r.cod_region
                    where
                        correo = '$p_codCorreo';
                ";
            $sentencia = $this->dblink->prepare($sql);
            //$sentencia->bindParam(":p_codigo_paciente", $p_codigoPaciente);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }


}
