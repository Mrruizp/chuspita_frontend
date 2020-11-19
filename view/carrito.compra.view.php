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
  <head><meta charset="big5">
    <title>La Chuspita</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    
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
            <ion-icon name="cart-outline" size="large"></ion-icon><h2 class="breadcrumbs-custom-title">Mi Carrito</h2>
            <!--<ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Inicio</a></li>
              <li><a href="shop.html">Shop</a></li>
              <li class="active">Cart Page</li>
            </ul>-->
          </div>
          <div class="box-position" style="background-image: url(../util/images/bg-breadcrumbs.jpg);"></div>
        </div>
      </section>
      <!-- Shopping Cart-->
      <section class="section section-xl bg-default">
        <div class="container">
          <!-- shopping-cart-->
          <div class="table-custom-responsive">
            <div id="Listar_carrito_all"></div>
          </div>
          <div class="group-xl group-lg-justify">
            <div>
              <!-- RD Mailform-->
              <!--<form class="rd-form rd-mailform rd-form-inline rd-form-coupon">
                <div class="form-wrap">
                  <input class="form-input form-input-inverse" id="coupon-code" type="text" name="email">
                  <label class="form-label" for="coupon-code">C車digo promocional</label>
                </div>
                <div class="form-button">
                  <button class="button button-primary button-pipaluk" type="submit">Aplicar cup車n</button>
                </div>
              </form>-->
            </div>
            <div>
              <div class="group-xmd group-middle">
                <div>
                  <div class="group-xmd group-middle">
                    <h6 class="text-gray-500">Total + IGV</h6>
                    <div id="ListaFinalizarCompra"></div>
                  </div>
                </div><a class="button button-secondary button-pipaluk" href="producto.checkout.view.php">Finalizar compra</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <?php include_once 'pie.view.php'; ?>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <?php include_once 'scripts.view.php'; ?>
    <script src="js/cargarDatos.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>
  </body>
</html>