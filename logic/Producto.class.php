<?php

require_once '../data/Conexion.class.php';
session_name("La_chuspita_cliente");
session_start();

class Producto extends Conexion {

    private $Descripcion;
    private $Unidad_medida;
    private $Precio;
    private $Marca;

    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function getUnidad_medida() {
        return $this->Unidad_medida;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function getMarca() {
        return $this->Marca;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    public function setUnidad_medida($Unidad_medida) {
        $this->Unidad_medida = $Unidad_medida;
    }

    public function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    public function setMarca($Marca) {
        $this->Marca = $Marca;
    }

    public function cargarDatosProducto($nombre) {
        try {
            $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto
                    where
                        lower(p.descripcion) like :p_nombre;

                    ";
            
            $sentencia = $this->dblink->prepare($sql);
            $nombre = '%'.strtolower($nombre).'%';
            $sentencia->bindParam(":p_nombre", $nombre);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
            
    }
/*
    public function listar_bebidas() {
        try {
                $sql = "
                    select 
                         p.descripcion,
                         p.unidad_medida,
                         m.descripcion_marca,
                         p.precio
                    from 
                        al_producto p inner join al_marca m
                    on
                        p.id_marca = m.id_marca inner join al_categoria c
                    on 
                        p.id_categoria = c.id_categoria
                    where
                        c.id_tipo = '01';
                ";
                 
            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
*/
    public function listarCaserita() { //lista de 4 productos para la página menú principal
       
        try {
            $sql = "
                    select 
                        p.id_producto,
                        p.descripcion,
                        v.precio

                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto
                    where
                        p.id_seccion = 2
                    limit 4;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarLimpiezaPersonal() { //lista de 4 productos para la página menú principal
       
        try {
            $sql = "
                    select 
                        p.id_producto,
                        p.descripcion,
                        v.precio

                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto
                    where
                        p.id_seccion = 3
                    limit 4;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarLimpiezaHogar() { //lista de 4 productos para la página menú principal
       
        try {
            $sql = "
                    select 
                        p.id_producto,
                        p.descripcion,
                        v.precio

                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto
                    where
                        p.id_seccion = 4
                    limit 4;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarRepostera() { //lista de 4 productos para la página menú principal
       
        try {
            $sql = "
                    select 
                        p.id_producto,
                        p.descripcion,
                        v.precio

                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto
                    where
                        p.id_seccion = 5
                    limit 4;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listarDulcera() { //lista de 4 productos para la página menú principal
       
        try {
            $sql = "
                    select 
                        p.id_producto,
                        p.descripcion,
                        v.precio

                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto
                    where
                        p.id_seccion = 6
                    limit 4;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listar_productos($idseccion) {// lista todos los productos por seccion
       
        try {
            $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad,
                        p.id_seccion
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join al_seccion s
                    on
                        p.id_seccion = s.id_seccion 
                    where
                        p.id_seccion = $idseccion; 
                ";
                
            $sentencia = $this->dblink->prepare($sql);

            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_todos_producto() {// muestra un producto según su descripción
       
        try {
            $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto;  
                ";
//            $sql = "
//                    select * from estudio_candidato 
//                    where doc_id = '$_SESSION[s_doc_id]'
//                ";
            $sentencia = $this->dblink->prepare($sql);
//            $sentencia->bindParam(":p_id", $_SESSION["s_doc_id"]);
//            $sentencia->bindParam(":p_fecha2", $p_fecha2);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_productosPorDescripcion($des_producto) {// muestra un producto según su descripción
       
        try {
            $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto
                    where
                        p.descripcion like '%$des_producto%';   
                ";
//            $sql = "
//                    select * from estudio_candidato 
//                    where doc_id = '$_SESSION[s_doc_id]'
//                ";
            $sentencia = $this->dblink->prepare($sql);
//            $sentencia->bindParam(":p_id", $_SESSION["s_doc_id"]);
//            $sentencia->bindParam(":p_fecha2", $p_fecha2);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_productosPorCategoria($tipoid) {// mostrar todos los productos
       
        try {
            $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto
                    where
                        p.id_tipo = $tipoid;   
                ";
//            $sql = "
//                    select * from estudio_candidato 
//                    where doc_id = '$_SESSION[s_doc_id]'
//                ";
            $sentencia = $this->dblink->prepare($sql);
//            $sentencia->bindParam(":p_id", $_SESSION["s_doc_id"]);
//            $sentencia->bindParam(":p_fecha2", $p_fecha2);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_productosMayorMenor($ordenar_producto, $p_id_seccion) {// muestra los producto de mayor a menor o viceversa
       
        try {
            if($ordenar_producto == 1)
            {
                $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join al_seccion s
                    on
                        p.id_seccion = s.id_seccion 
                    where
                        p.id_seccion = $p_id_seccion;
                ";
            }
            if($ordenar_producto == 2)
            {
                $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join al_seccion s
                    on
                        p.id_seccion = s.id_seccion 
                    where
                        p.id_seccion = $p_id_seccion
                    order by
                        v.precio desc;
                ";
            }
            if($ordenar_producto == 3)
            {
                $sql = "
                    select 
                        distinct p.id_producto, 
                        p.descripcion,
                        p.stock_actual,
                        v.precio,
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join al_seccion s
                    on
                        p.id_seccion = s.id_seccion 
                    where
                        p.id_seccion = $p_id_seccion
                    order by
                        v.precio asc 
                ";
            }

            
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_mis_pedidos() {// lista todos los pedidos que tiene un cliente.
       
        try {
            $sql = "
                    select 
                        c.nro_documento,
                        c.nombre,
                        c.correo,
                        c.telefono_celular,
                        p.direccion_entrega,
                        p.referencia_entrega,
                        p.observacion,
                        d.descripcion,
                        c.cod_distrito,
                        f.descripcion,
                        p.importe_total,
                        p.fecha_pedido,
                        p.nro_pedido,
                        p.cantidad_productos,
                        p.estado,
                        p.id_pedido
                    from 
                        cliente c inner join pedido p
                    on
                        c.id_cliente = p.id_cliente inner join distrito d
                    on
                        c.cod_distrito = d.cod_distrito inner join forma_pago f
                    on
                        f.id_forma_pago = p.id_forma_pago
                    where
                        p.estado = 'PENDIENTE' and c.id_cliente = '$_SESSION[cliente_id]';  
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_mis_productos_pedido($codpedido) {// lista todos los productos de un pedido para un cliente
       
        try {
            $sql = "
                    select 
                        p.descripcion,
                        i.cantidad,
                        i.precio_venta,
                        i.total_venta,
                        p.id_producto
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido 
                    where
                        e.id_cliente = '$_SESSION[cliente_id]' and e.estado = 'PENDIENTE' and e.id_pedido = $codpedido; 
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_productos_carrito() {// lista todos los productos que estan en el carrito de compra de un cliente.
       
        try {
            $sql = "
                    select 
                        p.descripcion,
                        i.cantidad,
                        i.precio_venta,
                        e.importe_total,
                        p.id_producto
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido 
                    where
                        e.id_cliente = '$_SESSION[cliente_id]' and e.estado is null;  
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_categoria_producto() {// lista todos los tipos con el número de productos que tiene: TIPO / NÚM. PRODUCTOS
       
        try {
            $sql = "
                    select 
                        t.descripcion_tipo,
                        count(p.id_producto) as num_producto,
                        p.id_tipo
                        
                    from 
                        al_producto p inner join al_tipo t
                    on
                        p.id_tipo = t.id_tipo
                    group by
                        t.descripcion_tipo;  
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function LeerParamProducto($param) {
        try {
            $sql = "
                    select 
                        p.descripcion,
                        c.descripcion_categoria,
                        r.precio,
                        u.descripcion as un_medida,
                        e.descripcion_envase
                    from 
                        al_producto p inner join al_categoria c
                    on
                        p.id_categoria = c.id_categoria left join precio_venta_producto r
                    on
                        p.id_producto = r.id_producto left join unidad_medida u
                    on
                        p.id_unidad_medida = u.id_unidad_medida left join al_envase e
                    on
                        p.id_envase = e.id_envase
                    where 
                        p.descripcion = '$param' or p.id_producto = '$param';
                ";
            $sentencia = $this->dblink->prepare($sql);
            //$sentencia->bindParam(":p_codigo_paciente", $p_codigoPaciente);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function leer_cant_producto($cod_producto) {
        try {
            $sql = "
                    select 
                        
                        i.cantidad
                    from 
                        al_producto p inner join precio_venta_producto v
                    on
                        p.id_producto = v.id_producto left join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido
                    where 
                        p.estado like 'ACTIVADO' and p.id_producto = $cod_producto and e.id_cliente = '$_SESSION[cliente_id]' and i.estado = 'PEDIDO';
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

    public function listar_subtotal_envio_total_pedido($cod_pedido) {// lista el resumen del pedido en la pag: mis.datos.view.php
       
        try {
            $sql = "  
                    select 
                        sum(e.cantidad_productos) as num_producto,
                        sum(i.total_venta) as precio_total,
                        e.gravado,
                        e.inafecto,
                        e.exonerado,
                        e.igv,
                        e.redondeo,
                        (SELECT tarifa from tarifario_transportista where id_pedido = $cod_pedido) as tarifa_distrito,
                        (select truncate(e.importe_total, 2)) as p_total
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido 
                    where
                        e.id_pedido = $cod_pedido; 
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listar_precio_envio_pedido($p_cod_distrito) {// lista el resumen del pedido en la pag: mis.datos.view.php
       
        try {
            $sql = "
                    select 
                        tarifa 
                    from 
                        tarifario 
                    where 
                        cod_distrito like '$p_cod_distrito';
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_datos_envio_pedido($cod_pedido) {// lista todos los datos de envío del pedido.
       
        try {
            $sql = "
                    select 
                        distinct e.direccion_entrega,
                        e.referencia_entrega,
                        e.observacion
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido 
                    where
                        e.id_cliente = '$_SESSION[cliente_id]' and e.estado = 'PENDIENTE' and e.id_pedido = $cod_pedido;  
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listar_productos_resumen_totales() {// lista totales carrito en la página: producto.checkout.view.php
       
        try {
            $sql = "
                    select 
                        sum(e.cantidad_productos) as num_producto,
                        e.gravado,
                        e.exonerado,
                        e.inafecto,
                        e.igv,
                        e.subtotal,
                        e.redondeo,
                        t.tarifa,
                        e.importe_total
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido left join tarifario_transportista t
                    ON
                    	e.id_pedido = t.id_pedido
                    where
                        e.id_cliente = '$_SESSION[cliente_id]' and e.estado = 'PENDIENTE';
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function listar_productos_resumen_totales_2() {// lista el total de los montos antes de realizar el pedido
       
        try {
            $sql = "
                    select 
                	DISTINCT e.cantidad_productos as num_producto,
                    e.gravado,
                    e.exonerado,
                    e.inafecto,
                    e.igv,
                    e.redondeo,
                    e.subtotal,
                    e.importe_total
                FROM 
                	al_inventario a inner join pedido e 
                ON 
                	a.id_pedido = e.id_pedido
                    where
                        e.id_cliente = '$_SESSION[cliente_id]' and e.estado is null;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    
        public function listar_productos_resumen_carrito() {// cabecera carrito.
       
        try {
            $sql = "
                    select 
                        DISTINCT e.cantidad_productos as num_producto,
                        e.importe_total as p_precio_total
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido 
                    where
                        e.id_cliente = $_SESSION[cliente_id] and e.estado is null;  
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    
    public function listar_productos_resumen_carrito_precio_total() { //muestra el importe total en producto checkout.
       
        try {
            $sql = "
                    select 
                        sum(i.total_venta) as precio_total,
                        e.redondeo
                    from 
                        al_producto p inner join al_inventario i
                    on
                        p.id_producto = i.id_producto inner join pedido e
                    on
                        i.id_pedido = e.id_pedido 
                    where
                        e.id_cliente = '$_SESSION[cliente_id]' and e.estado is null;  
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function eliminar($producto_id) {
        try {
            $sql = "
                    call fn_eliminar($producto_id, '$_SESSION[cliente_id]');
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
                $sentencia->execute();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }
/*
    public function actualizarCantProducto($producto_id, $cant, $precio) {
        try {
            $sql = "
                    update
                        al_inventario
                    set
                        cantidad = $cant,
                        total_venta = ($cant * $precio)
                    where
                        id_producto = $producto_id;
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
                $sentencia->execute();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }
    */
    
    public function actualizarCantProducto($producto_id, $cant) {
        try {
            $sql = "
                    call f_add_car($producto_id, $cant, '$_SESSION[cliente_id]');
                ";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
                $sentencia->execute();
            return true;
        } catch (Exception $exc) {
            throw $exc;
        }
        return false;
    }
    
    public function obtenerPedido() {
        try {
            $sql = "
                    select 
                    	p.nro_pedido,
                    	c.tipo_documento,
                        c.nro_documento,
                        c.nombre,
                        c.telefono_celular,
                        c.correo,
                        p.observacion,
                        p.direccion_entrega,
                        p.referencia_entrega,
                        o.descripcion,
                        v.precio,
                        a.cantidad,
                        a.total_venta,
                        p.inafecto,
                        p.gravado,
                        p.exonerado,
                        p.igv,
                        p.subtotal,
                        p.redondeo,
                        t.tarifa,
                        p.importe_total
                        
                    from
                    	cliente c inner join pedido p
                    on
                    	c.id_cliente = p.id_cliente inner join al_inventario a
                    on
                    	p.id_pedido = a.id_pedido inner join al_producto o
                    on
                    	a.id_producto = o.id_producto inner join tarifario_transportista t
                    on
                    	p.id_pedido = t.id_pedido inner join precio_venta_producto v
                    on
                    	o.id_producto = v.id_producto
                    where
                    	p.id_cliente = '$_SESSION[cliente_id]' 
                    ORDER by p.id_pedido desc limit 1;
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
