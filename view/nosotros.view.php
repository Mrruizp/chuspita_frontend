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
      <div class="page">
        <!-- Breadcrumbs -->
        <section class="breadcrumbs-custom-inset">
          <div class="breadcrumbs-custom context-dark bg-overlay-39">
            <div class="container">
              <h2 class="breadcrumbs-custom-title">Bienvenidos a La Chuspita</h2>
              <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Inicio</a></li>
                <li class="active">Bienvenidos a La Chuspita</li>
              </ul>
            </div>
            <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
          </div>
        </section>
        <section class="section section-xl bg-default text-left">
        <div class="container">
          <h2>Bienvenidos a La Chuspita</h2>
          <!-- Terms list-->
          <dl class="list-terms text-justify">
            <dt class="heading-4">¿QUIÉNES SOMOS?</dt>
            <dd>Somos un equipo de profesionales jóvenes, con amplio dominio de la tecnología y motivados a hacer las cosas bien. Creemos firmemente en nuestra gente y en su capacidad, en la promoción del talento interno en base a méritos. Somos innovadores, audaces y modernos, buscamos excelencia en todos nuestros procesos para poder trasladarles los beneficios de nuestra forma de trabajo a nuestros clientes y contagiar nuestro espíritu.
            Nuestra prioridad es ofrecerte la mejor experiencia de compra, con productos de calidad al menor precio, en la puerta de tu casa..</dd>
            <dt class="heading-4">MISIÓN</dt>
            <dd>Ser la primera opción de nuestros clientes por ofrecer productos, servicios y entregas de excelente calidad.</dd>
            <dt class="heading-4">VISIÓN</dt>
            <dd>Ser líderes en ventas a nivel mayorista y minorista dentro del mercado nacional.</dd>
            <dt class="heading-4">NUESTROS VALORES</dt>
            <dd>
              <span class="icon fa fa-check">Integridad: </span>Actuamos con respeto, honestidad y compromiso.
            </dd>
            <dd>
              <span class="icon fa fa-check">Innovación: </span>Buscamos nuevas formas de sorprender a nuestros clientes al ir más allá de sus expectativas.
            </dd>
            <dd>
              <span class="icon fa fa-check">Excelencia: </span>Realizamos una búsqueda constante para lograr ser los mejores en lo que hacemos y ser ganadores.
            </dd>
            <dd>
              <span class="icon fa fa-check">Trabajo en equipo: </span>Trabajamos y tomamos decisiones en forma conjunta, escuchando constantemente y teniendo una actitud positiva.
            </dd>
            <dd>
              <span class="icon fa fa-check">Servicio: </span>Brindamos una atención de calidad mediante un servicio integral, cubriendo las expectativas y requerimientos de nuestros clientes.
            </dd>

            <dt class="heading-5">PONTE EN CONTACTO CON NOSOTROS</dt>
            <dd>
              <i class="fa fa-mobile-phone"></i> 949898291
            </dd>
            <dd>
              <i class="fa fa-envelope-o"></i> ventas@lachuspita.pe
            </dd>
            <dd>
              <i class="fa fa-map-marker"></i> Calle Tintoretto - 149, primer piso San Borja
            </dd>

          </dl>
        </div>
      </section>
      </div>
    </div><br/>

    <?php include_once 'pie.view.php'; ?>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <?php include_once 'scripts.view.php'; ?>
    <!--<script src="js/mis.datos.js" type="text/javascript"></script>-->
    <script src="js/cbCodigo.js" type="text/javascript"></script>
    <script src="js/registrate.usuario.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>

   
  </body>
</html>