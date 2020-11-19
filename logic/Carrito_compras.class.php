<?php

require_once '../data/Conexion.class.php';
session_name("La_chuspita_cliente");
session_start();

class Carrito_compras extends Conexion {


    public function agregar($producto_param, $cant) {
        $this->dblink->beginTransaction();
        try {
            $sql = " 
                    call f_add_car($producto_param, $cant, $_SESSION[cliente_id]);
                
                ";
            $sentencia = $this->dblink->prepare($sql);
            
            $sentencia->execute();
            $this->dblink->commit();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }

    public function agregar_pedido($cod_distrito, $dir_entrega, $ref_entrega, $obs, $tipo_pago, $num_doc, $fecha_entrega, $recibo, $ruc, $razon_social) {
        $this->dblink->beginTransaction();
        try {
            $sql = " 
                    call f_add_pedido('$cod_distrito', '$dir_entrega', '$ref_entrega', '$obs', $tipo_pago, '$num_doc', $fecha_entrega, '$recibo', '$ruc', '$razon_social'); 
                
                ";
            $sentencia = $this->dblink->prepare($sql);
            
            $sentencia->execute();
            $this->dblink->commit();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }

}
