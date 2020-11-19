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
            <h2 class="breadcrumbs-custom-title">Testimonios</h2>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Inicio</a></li>
              <li><a href="about-us.html">Sobre nosotros</a></li>
              <li class="active">Testimonios</li>
            </ul>
          </div>
          <div class="box-position" style="background-image: url(../util/images/bg-breadcrumbs.jpg);"></div>
        </div>
      </section>
      <!-- Testimonials-->
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-xxl row-30 row-lg-70 justify-content-center">
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
              <!-- Quote Creative-->
              <article class="quote-creative"><a class="quote-creative-figure" href="#"><img class="img-circles" src="../util/images/user-10-87x87.jpg" alt="" width="87" height="87"/></a>
                <div class="quote-creative-text">
                  <p class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <h5 class="quote-creative-cite"><a href="#">Rupert Wood</a></h5>
              </article>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
              <!-- Quote Creative-->
              <article class="quote-creative"><a class="quote-creative-figure" href="#"><img class="img-circles" src="../util/images/user-11-87x87.jpg" alt="" width="87" height="87"/></a>
                <div class="quote-creative-text">
                  <p class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <h5 class="quote-creative-cite"><a href="#">Catherine Williams</a></h5>
              </article>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
              <!-- Quote Creative-->
              <article class="quote-creative"><a class="quote-creative-figure" href="#"><img class="img-circles" src="../util/images/user-12-87x87.jpg" alt="" width="87" height="87"/></a>
                <div class="quote-creative-text">
                  <p class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <h5 class="quote-creative-cite"><a href="#">Sam Peterson</a></h5>
              </article>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
              <!-- Quote Creative-->
              <article class="quote-creative"><a class="quote-creative-figure" href="#"><img class="img-circles" src="../util/images/user-13-87x87.jpg" alt="" width="87" height="87"/></a>
                <div class="quote-creative-text">
                  <p class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <h5 class="quote-creative-cite"><a href="#">Sarah Johnson</a></h5>
              </article>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
              <!-- Quote Creative-->
              <article class="quote-creative"><a class="quote-creative-figure" href="#"><img class="img-circles" src="../util/images/user-14-87x87.jpg" alt="" width="87" height="87"/></a>
                <div class="quote-creative-text">
                  <p class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <h5 class="quote-creative-cite"><a href="#">Peter McMillan</a></h5>
              </article>
            </div>
            <div class="col-sm-10 col-md-6 col-lg-5 col-xl-4">
              <!-- Quote Creative-->
              <article class="quote-creative"><a class="quote-creative-figure" href="#"><img class="img-circles" src="../util/images/user-15-87x87.jpg" alt="" width="87" height="87"/></a>
                <div class="quote-creative-text">
                  <p class="q">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <h5 class="quote-creative-cite"><a href="#">Andrew Lee</a></h5>
              </article>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
        <div class="footer-variant-2-content">
          <div class="container">
            <div class="row row-40 justify-content-between">
              <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="oh-desktop">
                  <div class="wow slideInRight" data-wow-delay="0s">
                    <div class="footer-brand"><a href="index.html"><img src="../util/images/Chuspita-logo.jpg" alt="" width="154" height="42"/></a></div>
                    <p>Herber is an organic farm located in California. We offer healthy foods and products to our clients.</p>
                    <ul class="footer-contacts d-inline-block d-md-block">
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                          <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                          <div class="unit-body">
                            <p>Mon-Sat: 07:00AM - 05:00PM</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs">
                          <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                          <div class="unit-body"><a class="link-location" href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4 col-xl-4">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInDown" data-wow-delay="0s">
                    <h5>Newsletter</h5>
                    <p>Join our email newsletter for news and tips.</p>
                    <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                      <div class="form-wrap">
                        <input class="form-input" id="subscribe-form-5-email" type="email" name="email" data-constraints="@Email @Required">
                        <label class="form-label" for="subscribe-form-5-email">Enter Your E-mail</label>
                      </div>
                      <button class="button button-block button-white" type="submit">Subscribe</button>
                    </form>
                    <div class="group-lg group-middle">
                      <p class="text-white">Follow Us</p>
                      <div>
                        <ul class="list-inline list-inline-sm footer-social-list-2">
                          <li><a class="icon fa fa-facebook" href="#"></a></li>
                          <li><a class="icon fa fa-twitter" href="#"></a></li>
                          <li><a class="icon fa fa-google-plus" href="#"></a></li>
                          <li><a class="icon fa fa-instagram" href="#"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xl-3">
                <div class="oh-desktop">
                  <div class="inset-top-18 wow slideInLeft" data-wow-delay="0s">
                    <h5>Gallery</h5>
                    <div class="row row-10 gutters-10">
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="../util/images/gallery-image-1-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="../util/images/gallery-original-7-800x1200.jpg" data-lightgallery="item"><img src="../util/images/gallery-image-1-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="../util/images/gallery-image-2-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="../util/images/gallery-original-8-1200x800.jpg" data-lightgallery="item"><img src="../util/images/gallery-image-2-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="../util/images/gallery-image-3-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="../util/images/gallery-original-9-800x1200.jpg" data-lightgallery="item"><img src="../util/images/gallery-image-3-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                      <div class="col-6 col-sm-3 col-lg-6">
                        <!-- Thumbnail Classic-->
                        <article class="thumbnail thumbnail-mary">
                          <div class="thumbnail-mary-figure"><img src="../util/images/gallery-image-4-129x120.jpg" alt="" width="129" height="120"/>
                          </div>
                          <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="../util/images/gallery-original-10-1200x800.jpg" data-lightgallery="item"><img src="../util/images/gallery-image-4-129x120.jpg" alt="" width="129" height="120"/></a>
                          </div>
                        </article>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-variant-2-bottom-panel">
          <div class="container">
            <!-- Rights-->
            <div class="group-sm group-sm-justify">
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> <span>La Chuspita</span>. All rights reserved
              </p>
              <p class="rights"><a href="privacy-policy.html">Privacy Policy</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <?php include_once 'scripts.view.php'; ?>
  </body>
</html>