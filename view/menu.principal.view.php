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
      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-modern" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="true" data-slide-effect="fade">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide context-dark" data-slide-bg="../util/images/slider-1-1920x729.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row justify-content-center justify-content-xxl-start">
                  <div class="col-md-10 col-xxl-6">
                    <div class="slider-modern-box">
                      <h1 class="slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">Organic Food</span></h1>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">Herber provides local citizens and guests of our town with quality organic fruits, vegetables, and other products.</p>
                      <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="about-us.html" data-caption-animate="slideInLeft" data-caption-delay="400">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="../util/images/slider-2-1920x729.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row justify-content-center justify-content-xxl-start">
                  <div class="col-md-10 col-xxl-6">
                    <div class="slider-modern-box">
                      <h1 class="slider-modern-title"><span data-caption-animate="slideInLeft" data-caption-delay="0">Quality Control</span></h1>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">We control the process of farming at Herber to deliver the best organic products to our customers throughout the state.</p>
                      <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="about-us.html" data-caption-animate="slideInLeft" data-caption-delay="400">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="../util/images/slider-3-1920x729.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row justify-content-center justify-content-xxl-start">
                  <div class="col-md-10 col-xxl-6">
                    <div class="slider-modern-box">
                      <h1 class="slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">Eco-Friendly</span></h1>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">As the leading organic farm, we maintain an eco-friendly policy of growing and selling healthy food without any additives.</p>
                      <div class="oh button-wrap"><a class="button button-primary button-ujarak" href="about-us.html" data-caption-animate="slideInUp" data-caption-delay="400">Read more</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination swiper-pagination-style-2"></div>
      </section>

      <!-- Trending products-->
      <section class="section section-md bg-default section-top-image">
        <div class="container">
          <div class="row row-40 justify-content-center flex-md-row-reverse">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              
              <div class="product-banner"><img src="fotos/productos/LaCaserita.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(../util/images/bg-brush.png)">
                    <h3 class="text-primary">Productos</h3>
                    <h2 class="text-secondary">La Caserita</h2>
                    <a class="button button-sx button-primary" href="productos.view.php?id=2">VER MAS</a>
                  </div>
                </div>
              </div>
           
            </div>
            <div class="col-md-5 col-lg-6">
                <div id="listado"></div>
                
            </div>
          </div>
        </div>
      </section>
     <!-- Trending products-->
      <section class="section section-md bg-default section-top-image">
        <div class="container">
          <div class="row row-40 justify-content-center flex-md-row-reverse">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              
              <div class="product-banner"><img src="fotos/productos/LaDulcera.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(../util/images/bg-brush.png)">
                    <h3 class="text-primary">Productos</h3>
                    <h2 class="text-secondary">La Dulcera</h2>
                    <a class="button button-sx button-primary" href="productos.view.php?id=6">VER MAS</a>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-5 col-lg-6">
                <div id="listadoLaDulcera"></div>
                
            </div>
          </div>
        </div>
      </section>
      <!-- Trending products-->
      <section class="section section-md bg-default section-top-image">
        <div class="container">
          <div class="row row-40 justify-content-center flex-md-row-reverse">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              
              <div class="product-banner"><img src="fotos/productos/LaRepostera.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(../util/images/bg-brush.png)">
                    <h3 class="text-primary">Productos</h3>
                    <h2 class="text-secondary">La Repostera</h2>
                    <a class="button button-sx button-primary" href="productos.view.php?id=5">VER MAS</a>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-5 col-lg-6">
                <div id="listadoLaRepostera"></div>
                
            </div>
          </div>
        </div>
      </section>
      <!-- Trending products-->
      <section class="section section-md bg-default section-top-image">
        <div class="container">
          <div class="row row-40 justify-content-center flex-md-row-reverse">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              
              <div class="product-banner"><img src="fotos/productos/LimpiezaHogar.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(../util/images/bg-brush.png)">
                    <h3 class="text-primary">Productos</h3>
                    <h2 class="text-secondary">Limpieza del Hogar</h2>
                    <a class="button button-sx button-primary" href="productos.view.php?id=4">VER MAS</a>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-5 col-lg-6">
                <div id="listadoLimpiezaHogar"></div>
                
            </div>
          </div>
        </div>
      </section>
      <!-- Trending products-->
      <section class="section section-md bg-default section-top-image">
        <div class="container">
          <div class="row row-40 justify-content-center flex-md-row-reverse">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              
              <div class="product-banner"><img src="fotos/productos/AseoPersonal.jpg" alt="" width="570" height="715"/>
                <div class="product-banner-content">
                  <div class="product-banner-inner" style="background-image: url(../util/images/bg-brush.png)">
                    <h3 class="text-primary">Productos</h3>
                    <h2 class="text-secondary">Limpieza Personal</h2>
                    <a class="button button-sx button-primary" href="productos.view.php?id=3">VER MAS</a>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-5 col-lg-6">
                <div id="listadoLimpiezaPersonal"></div>
                
            </div>
          </div>
        </div>
      </section>
      <!-- How we work-->
      <section class="section section-md bg-plomo">
        <div class="container">
          <h2>Cómo ordenar</h2>
          <div class="row row-30 row-sm justify-content-center box-ordered">
            <div class="col-sm-4 col-md-5 col-lg-2">
              <article class="box-icon-leah">
                <ion-icon name="search-circle-outline" size="large"></ion-icon>
                <h5 class="box-icon-leah-title"><a href="single-service.html">Buscar tu Producto</a></h5>
                
                <div class="box-icon-leah-count box-ordered-item"></div>
              </article>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-2">
              <article class="box-icon-leah">
                <ion-icon name="cart-outline" size="large"></ion-icon>
                <h5 class="box-icon-leah-title"><a href="single-service.html">Agregar al Carrito</h5>
                
                <div class="box-icon-leah-count box-ordered-item"></div>
              </article>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-2">
              <article class="box-icon-leah">
                <ion-icon name="clipboard-outline" size="large"></ion-icon>
                <h5 class="box-icon-leah-title"><a href="single-service.html">Ver Carrito de Compras</a></h5>
                
                <div class="box-icon-leah-count box-ordered-item"></div>
              </article>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-2">
              <article class="box-icon-leah">
                <ion-icon name="cube-outline" size="large"></ion-icon>
                <h5 class="box-icon-leah-title"><a href="single-service.html">Programa tu Envío</a></h5>
                
                <div class="box-icon-leah-count box-ordered-item"></div>
              </article>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-2">
              <article class="box-icon-leah">
                <ion-icon name="card-outline" size="large"></ion-icon>
                <h5 class="box-icon-leah-title"><a href="single-service.html">Comprar Ahora</a></h5>
                
                <div class="box-icon-leah-count box-ordered-item"></div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <section class="section context-dark">
        <div class="parallax-container" data-parallax-img="../util/images/bg-parallax-3.jpg">
          <div class="parallax-content section-md bg-overlay-24">
            <div class="container">
              <div class="oh">
                <h2 class="wow slideInUp" data-wow-delay="0s">Lo que dice la gente</h2>
              </div>
              <!-- Owl Carousel-->
              <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="../util/images/user-16-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">
                        Hoy recogí una cabeza de lechuga en un supermercado local. ¡Qué lechuga tan increíble y hermosa es! Nunca había visto otro tan lleno, verde y tentador.
                      </p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Samantha Peterson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="../util/images/user-17-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">
                        Quería decirte lo increíble que era ver la granja y cuánto nos encanta la comida. Sus manzanas y zanahorias son simplemente maravillosas y su sabor es excelente.
                      </p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">John Wilson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                  <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="../util/images/user-18-100x100.jpg" alt="" width="100" height="100"/></a>
                    <div class="quote-lisa-text">
                      <p class="q">
                        La comida de tu granja es maravillosa. Muchas noches, cuando nos sentamos a cenar, podemos decir que todo en este plato es cultivado localmente y delicioso. ¡Gracias!
                      </p>
                    </div>
                    <h5 class="quote-lisa-cite"><a href="#">Kate Anderson</a></h5>
                    <p class="quote-lisa-status">Regular Client</p>
                  </div>
                </article>
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
    <script src="js/cargarDatos.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>
    
  </body>
</html>