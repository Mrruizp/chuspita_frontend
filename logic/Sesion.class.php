<?php

require_once '../data/Conexion.class.php';

class Sesion extends Conexion {

    private $email;
    private $clave;

    public function getEmail() {
        return $this->email;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function iniciarSesion() {
        try {
            $sql = "
                    select 
                        c.tipo_cliente,
                        c.tipo_documento,
                        d.descripcion as dist,
                        d.cod_distrito,
                        p.descripcion as prov,
                        d.cod_provincia,
                        r.descripcion as reg,
                        r.cod_region,
                        s.pswd,
                        s.clave_desencriptada,
                        s.estado,
                        c.id_cliente,
                        c.nombre,
                        c.nombre_comercial,
                        c.nro_documento,
                        c.telefono_celular,
                        c.direccion
                    from
                        sec_users s inner join cliente c 
                    on
                        s.email = c.correo left join distrito d
                    on
                        c.cod_distrito = d.cod_distrito left join provincia p
                    on
                        d.cod_provincia = p.cod_provincia left join region r
                    on
                        p.cod_region = r.cod_region
                    where
                            s.login = :p_email;
                ";


            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_email", $this->getEmail());
//            $sentencia->bindParam(":p_tipo", $this->getTipo());
            $sentencia->execute();

            if ($sentencia->rowCount()) {//Le pregunto si ha devuelto registros
                //El usuario si existe
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                if ($resultado["pswd"] === md5($this->getClave())) {
                    if ($resultado["estado"] === "I") {
                        return "IN"; //Usuario Inactivo
                    } else {
                        session_name("La_chuspita_cliente");
                        session_start();

                       
                            $_SESSION["s_email"]   = $this->getEmail();
                            $_SESSION["t_cliente"] = $resultado["tipo_cliente"];
                            $_SESSION["t_doc"]     = $resultado["tipo_documento"];
                            $_SESSION["distrito"]  = $resultado["dist"];
                            $_SESSION["provincia"] = $resultado["prov"];
                            $_SESSION["region"]    = $resultado["reg"];

                            $_SESSION["coddistrito"]  = $resultado["cod_distrito"];
                            $_SESSION["codprovincia"] = $resultado["cod_provincia"];
                            $_SESSION["codregion"]    = $resultado["cod_region"];
                            $_SESSION["clave"]        = $resultado["clave_desencriptada"];
                            $_SESSION["cliente_id"]   = $resultado["id_cliente"];

                            $_SESSION["p_nombre"]           = $resultado["nombre"];
                            $_SESSION["p_nombre_comercial"] = $resultado["nombre_comercial"];
                            $_SESSION["p_nro_documento"]    = $resultado["nro_documento"];
                            $_SESSION["p_telefono_celular"] = $resultado["telefono_celular"];
                            $_SESSION["p_direccion"]        = $resultado["direccion"];
                        

                        return "SI"; //Si ingresa
                    }
                } else { //la contraseña no es igual
                    return "CI"; //Contraseña incorrecta
                }
            } else { //No se encontró registros (El usuario no existe)
                return "NE"; //No Existe
            }
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function numInicioSsion()
    {
        session_name("La_chuspita_cliente");
                        session_start();
        $this->dblink->beginTransaction();
        
        
        try {
                /* Insertar en la tabla laboratorio */
                $sql = "
                        select * from fn_numSesion
                                            (
                                                '$_SESSION[s_doc_id]'
                                            );
                    ";
                $sentencia = $this->dblink->prepare($sql);
               // $sentencia->bindParam(":p_numiniciosesion", $this->getNuminiciosesion());
                $sentencia->execute();
                
                $this->dblink->commit();
                return true;
          
        } catch (Exception $exc) {
            $this->dblink->rollBack();
            throw $exc;
        }

        return false;
    }
    
    public function obtenerOpcionesMenu($codigoCargo) {
        try {
            $sql = "
                select
                        distinct 
                        m.codigo_menu,
                        m.nombre
                from
                        menu m
                        inner join menu_item_accesos a on ( m.codigo_menu = a.codigo_menu )
                where
                        a.cargo_id = :p_cargo_id
                        and a.acceso = '1'
                order by
                        1
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cargo_id", $codigoCargo);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

public function obtenerOpcionesMenuItem($codigoCargo, $codigoMenu) {
        try {
            $sql = "
                    select
                            m.nombre,
                            m.archivo
                    from
                            menu_item m
                            inner join menu_item_accesos a 
                            on 
                            ( 
                                    m.codigo_menu = a.codigo_menu and 
                                    m.codigo_menu_item = a.codigo_menu_item 
                            )

                    where
                            a.cargo_id = :p_cargo_id
                            and a.codigo_menu = :p_codigo_menu
                            and a.acceso = '1'
                    order by
                            a.codigo_menu_item
                ";
            
//            $sentencia = $this->dbLink->prepare($sql);
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_cargo_id", $codigoCargo);
            $sentencia->bindParam(":p_codigo_menu", $codigoMenu);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    
}
