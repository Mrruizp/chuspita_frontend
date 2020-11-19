<?php

require_once '../data/Conexion.class.php';
session_name("La_chuspita_cliente");
session_start();

class comboCodigo extends Conexion {

    public function cargarDatos_codigo_fecha_entrega($p_fech_entrega) {
        
        try {
            $sql = "
                    select 
                    	id_horario_entrega, 
                        concat(DATE_FORMAT(hora_ini, '%h:%i'),' - ', 
                        DATE_FORMAT(hora_fin, '%h:%i %p'))as fech_entr, 
                        cantidad_cliente
                    from 
                    	horario_entrega
                        
                    where 
                    	DATE_FORMAT(hora_ini, '%Y-%m-%d') = DATE_FORMAT('$p_fech_entrega', '%Y-%m-%d') and 
                        estado='DISPONIBLE' and 
                        cantidad_cliente>=0;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function cargarDatos_codigo_forma_pago() {
        
        try {
            $sql = "
                    select 
                        id_forma_pago,
                        descripcion
                    from
                        forma_pago;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function cargarDatos_CodigoDepartamento() {
        
        try {
            $sql = "
                    select 
                        cod_region, 
                        descripcion 
                    from 
                        region;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function cargarDatos_CodigoProvincia() {
        
        try {
            $sql = "
                    select 
                        cod_provincia, 
                        descripcion 
                    from 
                        provincia;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function cargarDatos_CodigoDistrito() {
        
        try {
            $sql = "
                    select 
                        cod_distrito, 
                        descripcion 
                    from 
                        distrito;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function cargarDatos_distritos_lima() {
        
        try {
            $sql = "
                    select 
                        cod_distrito, 
                        descripcion 
                    from 
                        distrito
                    where
                        cod_region = '15';";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }


    public function cargarDatos_CodigoProvinciaDepartamento($codigo_departamento) {
        
        try {
            $sql = "
                    select 
                        cod_provincia,
                        descripcion
                    from
                        provincia
                    where
                        cod_region = $codigo_departamento;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function cargarDatos_CodigoDistritoProvincia($codigo_provincia) {
        
        try {
            $sql = "
                    select 
                        cod_distrito,
                        descripcion
                    from
                        distrito
                    where
                        cod_provincia = $codigo_provincia;";

            
            $sentencia = $this->dblink->prepare($sql);
           // $sentencia->bindParam(":p_curso_id", $codigo_curso);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}
