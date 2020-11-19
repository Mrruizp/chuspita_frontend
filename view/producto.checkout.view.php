<?php
    require_once 'validar.datos.sesion.view.php';
?>
<?php

    //Creando y asignando un valor a la variable $_POST["dniUsuarioSesion"];
    $_POST["s_email"] = $email;
    
    require_once '../controller/perfil.usuario.leer.datos.controller.php';
    
    
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>La Chuspita</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    
    <?php include_once 'estilos.view.php'; ?>
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        
                
                <?php include_once './menu-arriba.admin.view.php'; ?>
             
      </header>
      <!-- Breadcrumbs -->
      <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-39">
          <div class="container">
            <h2 class="breadcrumbs-custom-title">Revisa</h2>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Inicio</a></li>
              <li><a href="shop.html">Tienda</a></li>
              <li class="active">Revisa</li>
            </ul>
          </div>
          <div class="box-position" style="background-image: url(../util/images/bg-breadcrumbs.jpg);"></div>
        </div>
      </section>
      <!-- Section checkout form-->
      <form id="frmgrabarPedido">
        <section class="section section-md section-first bg-default text-md-left">
          <div class="container">
            <div class="row row-50 justify-content-center">
              <div class="col-md-10 col-lg-6">
                <h4 class="text-spacing-50">Identificación Cliente</h4>
                
                  <div class="row row-14 gutters-14 rd-form rd-mailform">
                    
                      <?php 
                            if($resultado["nombre"])
                            {
                        ?>   
                            <div class="col-sm-12">
                                <div class="form-wrap">Nombre y Apellido
                                <input class="form-input" type="text" value="<?php echo $resultado["nombre"];  ?>" disabled="" />
                                </div>
                            </div>
                        <?php 
                            }else
                            {
                        ?>   
                            
                                <input class="form-input" type="text" value="<?php echo $resultado["nombre"];  ?>" style="display:none;" disabled="" />
                                
                                
                             <?php    
                            }
                      
                      
                      ?>
                      <?php 
                            if($resultado["nombre_comercial"])
                            {
                        ?>   
                            <div class="col-sm-12">
                                <div class="form-wrap">Nombre Comercial
                                    <input class="form-input" type="text" value="<?php echo $resultado["nombre_comercial"];  ?>" disabled="" />
                                </div>
                            </div>
                        <?php 
                            }else
                            {
                        ?>   
                            
                                <input class="form-input" type="text" value="<?php echo $resultado["nombre_comercial"];  ?>" style="display:none;" disabled="" />
                                
                                
                             <?php    
                            }
                      
                      
                      ?>
                      
                    <div class="col-sm-12">
                      <div class="form-wrap">Nro. Documento
                        <input class="form-input"type="text" id = "numDoc" name = "numDoc" value="<?php echo $resultado["nro_documento"];  ?>" disabled="" />
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-wrap">Correo
                        <input class="form-input" type="text" value="<?php echo $resultado["correo"];  ?>" disabled="" />
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-wrap">Nro. Celular
                        <input class="form-input" type="text" value="<?php echo $resultado["telefono_celular"];  ?>" disabled="" />
                        
                      </div>
                    </div>
                  </div>
                  <!--<label class="checkbox-inline">
                    <<input name="input-checkbox-1" value="checkbox-1" type="checkbox"/>My Billing Address and Shipping Address are the same
                  </label>-->
                
              </div>
              <div class="col-md-10 col-lg-6">
                <h4 class="text-spacing-50">Método de entrega</h4>
                
                  <div class="row row-14 gutters-14 rd-form rd-mailform">
                    <div class="col-sm-6">
                      <div class="form-wrap">Recibo
                        <select class="form-input" id="cb_recibo" name="cb_recibo" onChange="mostrar(this.value);">
                              <option>-</option>
                              <option value="01">Factura</option>
                              <option value="03">Boleta de venta</option>
                        </select>
                        
                        <!--<label class="form-label" for="checkout-postcode-1">¿Quíen lo recibe?, documento de identidad, número de celular</label>-->
                      </div>
                    </div>
                    <div class="col-6" id = "mostrarRuc" style="display: none;">
                      <div class="form-wrap">RUC
                        <input class="form-input" type="text" id="textRUC" name="textRUC" data-constraints="@Required"/>
                        <!--<label class="form-label" for="checkout-company-1">Dirección de entrega</label>-->
                      </div>
                    </div>
                    <div class="col-12" id = "mostrarRazonSocial" style="display: none;">
                      <div class="form-wrap">Razon Social
                        <input class="form-input" type="text" id="textRazonSocial" name="textRazonSocial" data-constraints="@Required"/>
                        <!--<label class="form-label" for="checkout-company-1">Dirección de entrega</label>-->
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-wrap">Región
                        <select class="form-input select-filter" disabled="">
                          <option>Lima</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-wrap">Distrito
                        <select class="form-input select-filter" id="cbDistrito" name="cbDistrito" onchange="listar_precio_envio(this.value)">
                          <option> - </option>
                          <option value="150113">Miraflores</option>
                          <option value="150122">San Borja</option>
                          <option value="150130">Santiago de Surco</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-wrap">Dirección de entrega
                        <input class="form-input" type="text" id="textDirecEntrega" name="textDirecEntrega" value= "<?php echo $_SESSION["p_direccion"];  ?>" data-constraints="@Required"/>
                        <!--<label class="form-label" for="checkout-company-1">Dirección de entrega</label>-->
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-wrap">Referencia de entrega
                        <input class="form-input" type="text" id="textRefEntrega" name="textRefEntrega" data-constraints="@Required"/>
                        <!--<label class="form-label" for="checkout-address-1">Referencia de entrega</label>-->
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-wrap">¿Quién lo recibe?, documento de identidad, número de celular
                        <textarea class="form-input" rows= "2" type="text" id="textObserv" name="textObserv" data-constraints="@Required"></textarea>
                        
                        <!--<label class="form-label" for="checkout-postcode-1">¿Quíen lo recibe?, documento de identidad, teléfono</label>-->
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-wrap">Fecha Entrega
                      <!-- <input class="form-input" type="date" id="textFechaEntrega" placeholder="Introduce una fecha" required min=<?php $fecha_actual = date("Y-m-j"); echo date("Y-m-j",strtotime($fecha_actual."- 1 days"));?> max=<?php $f_fin=date("Y-m-t"); echo $f_fin;?> name="textFechaEntrega" onChange="mostrarHorario(this.value);"/> -->
                        <input class="form-input" type="date" id="textFechaEntrega" placeholder="Introduce una fecha" required min=<?php $fecha_actual = date("Y-m-j"); echo $fecha_actual?> max=<?php $f_fin=date("Y-m-t"); echo $f_fin;?> name="textFechaEntrega" onChange="mostrarHorario(this.value);"/>
                        
                    
                    

                        <!--<label class="form-label" for="checkout-company-1">Dirección de entrega</label>-->
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-wrap">Rango de Horario de entrega
                        <select class="form-input" id="cb_fecha_entrega" name="cb_fecha_entrega">
                              
                        </select>
                        
                        <!--<label class="form-label" for="checkout-postcode-1">¿Quíen lo recibe?, documento de identidad, teléfono</label>-->
                      </div>
                    </div>
                    
                  </div>
                
              </div>
            </div>
          </div>
        </section>
        <!-- Shopping Cart-->
        <section class="section section-md bg-default text-md-left">
          <div class="container">
            <h4 class="text-spacing-50">Tu carrito de compra</h4>
            <!-- shopping-cart-->
            <div class="table-custom-responsive">
              <div id="Listar_carrito_all_checkout"></div>
            </div>
          </div>
        </section>

        <!-- Section payment-->
        <section class="section section-md section-last bg-default text-md-left">
          <div class="container">
            <div class="row row-50">
              <div class="col-md-10 col-lg-6">
                <h4 class="text-spacing-50">Métodos de pago</h4>
                <div class="box-radio">
                  <div class="col-sm-12">
                      <div class="form-wrap">
                        <select class="form-input" id="cb_forma_pago" name="cb_forma_pago">
                              <option>-</option>
                        </select>
                        
                        <!--<label class="form-label" for="checkout-postcode-1">¿Quíen lo recibe?, documento de identidad, teléfono</label>-->
                      </div>
                    </div>
               
                
              </div>
              </div>
              <div class="col-md-10 col-lg-6">
                <h4 class="text-spacing-50">Totales del carrito</h4>
                <div class="table-custom-responsive">
                    
                        <div id="ListaTotales_carrito_checkout"></div>
                        <div id="ListaPrecio_envio"></div>
                        <div id="ListaPrecio_total_pedido"></div>
                   
                </div>
              </div>
            </div>
            <div class="button-wrap text-center">
              <button type="submit" class="button button-primary button-pipaluk">
                Realizar pedido
              </button>
            </div>

          </div>
        </section>
      </form>
      <!-- Page Footer-->
      <?php include_once 'pie.view.php'; ?>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <?php include_once 'scripts.view.php'; ?>
    <script src="js/resumen.compra.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/cbCodigo.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>
    <script type="text/javascript">
        function mostrar(id) {
            if (id == "01") {
                $("#mostrarRuc").show();
                $("#mostrarRazonSocial").show();
            }else
                {
                    $("#mostrarRuc").hide();
                $("#mostrarRazonSocial").hide();
                }
        }
    </script>
  </body>
</html>