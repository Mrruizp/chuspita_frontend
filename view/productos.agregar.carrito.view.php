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
     <!-- Shop-->
      <section class="section section-xl bg-default">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6">
              <div class="slick-product">
                <!-- Slick Carousel-->
                <div class="slick-slider carousel-parent" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
                  <div class="item">
                  
                    <div class="slick-product-figure"><img src="https://lachuspita.pe/backend/_lib/file/img/productos/<?php print_r($_GET["id"])?>.jpg" alt="" style="width:530px; height:480px;"/>
                    </div>
                  </div>
                  <!--<div class="item">
                    <div class="slick-product-figure"><img src="fotos/productos/carrito/<?php print_r($_GET["id"])?>_2.png" alt="" width="530" height="480"/>
                    </div>
                  </div>
                  <div class="item">
                    <div class="slick-product-figure"><img src="fotos/productos/carrito/<?php print_r($_GET["id"])?>_3.png" alt="" width="530" height="480"/>
                    </div>
                  </div>-->
                </div>
                <!--<div class="slick-slider child-carousel" id="child-carousel" data-for=".carousel-parent" data-arrows="true" data-items="3" data-sm-items="3" data-md-items="3" data-lg-items="3" data-xl-items="3" data-slide-to-scroll="1" data-md-vertical="true">
                  <div class="item">
                    <div class="slick-product-figure"><img src="fotos/productos/carrito/<?php print_r($_GET["id"])?>_1_mini.png" alt="" width="169" height="152"/>
                    </div>
                  </div>
                  <div class="item">
                    <div class="slick-product-figure"><img src="fotos/productos/carrito/<?php print_r($_GET["id"])?>_2_mini.png" alt="" width="169" height="152"/>
                    </div>
                  </div>
                  <div class="item">
                    <div class="slick-product-figure"><img src="fotos/productos/carrito/<?php print_r($_GET["id"])?>_3_mini.png" alt="" width="169" height="152"/>
                    </div>
                  </div>
                </div>-->
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single-product">
                <div id="listar"></div><br/>
                
                
                <form id="frmgrabarCarrito">
                <div class="group-sm group-middle">
                  <input class="form-input" type="hidden" id="textProducto_id" name="textProducto_id" value="<?php print_r($_GET["id"])?>">
                  <div class="product-stepper">
                    <input class="form-input" type="number" id="textCan" name="textCan" data-zeros="true" value="1" min="1" max="1000">

                  </div>
                  <div><button type="submit" class="button button-primary button-pipaluk">AGREGAR</a></div>
                </div>
                <div class="divider divider-40"></div>
                <!--<div class="group-md group-middle"><span class="social-title">Compartir</span>
                  <div>
                    <ul class="list-inline list-inline-sm social-list">
                      <li><a class="icon fa fa-facebook" href="#"></a></li>
                      <li><a class="icon fa fa-twitter" href="#"></a></li>
                      <li><a class="icon fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon fa fa-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>-->
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php include_once 'pie.view.php'; ?>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <?php include_once 'scripts.view.php'; ?>
    <script src="js/cargarDatosCarrito.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>
  </body>
</html>