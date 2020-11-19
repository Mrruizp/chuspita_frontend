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
          <div class="row row-90 justify-content-center">
            <div class="col-lg-8 col-xl-9">
              <div class="product-top-panel group-lg">
                <div class="product-top-panel-title"></div>
                <div class="product-top-panel-select">
                  <!--Select 2-->
                 
                  <select class="form-input" name="ordenarMayorMenorPrecio" id="ordenarMayorMenorPrecio" onclick="ordenarPorPrecio();ocultarListarPrecioProductos();"data-minimum-results-for-search="Infinity" data-constraints="@Required">
                    <option value="1">Todos los productos</option>
                    <option value="2">Precio mayor a menor</option>
                    <option value="3">Precio menor a mayor</option>
                  </select>
                 
                </div>
              </div>
              <div class="row row-lg row-40">
                <!-- Shopping Cart-->
                <section class="col-sm-6 col-md-4">
                  <div class="container">
                    <!-- shopping-cart-->
                    <div class="table-custom-responsive">
                      <div id="nolistadoPerecibles">
                        
                      </div>
                      <div id="listaDescripcionProductos"> <!-- lista por descripción de producto -->
                        
                      </div>
                      <div id="listaMayorMenorPrecioProductos"> <!-- lista por descripción de producto -->
                        
                      </div>
                      <div id="listaTipoProducto"> <!-- lista por descripción de producto -->
                        
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!--<div class="pagination-wrap">
                
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>
                    <li class="page-item active"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item page-item-control"><a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>
                  </ul>
                </nav>
              </div>-->
            </div>
            <div class="col-sm-10 col-md-12 col-lg-4 col-xl-3">
              <!-- RD Search Form-->
              <div class="form-search rd-search form-product-search">
                <div class="form-wrap">
                  <label class="form-label" for="search-form">Búsqueda de Producto..</label>
                  <input class="form-input" id="search-form" type="text" name="search-form" style="text-transform:uppercase;">
                  <button class="button-search fl-bigmug-line-search74" type="submit" onclick="listarDescripcionProductos();ocultarListarProductos()"></button>
                </div>
              </div>
              <div class="row row-lg row-50 product-sidebar">
                <div class="col-md-6 col-lg-12">
                  <h5>Categorías Populares</h5>
                  
                    <div id="listarCategoria"></div>
                  
                </div>
                <!--<div class="col-md-6 col-lg-12">
                  <h5>Filtrar por precio</h5>
                  
                  <div class="rd-range" data-min="0" data-max="999" data-min-diff="100" data-start="[66, 290]" data-step="1" data-tooltip="false" data-input=".rd-range-input-value-1" data-input-2=".rd-range-input-value-2"></div>
                  <div class="group-sm group-justify">
                    <div>
                      <div class="button button-md button-primary button-pipaluk">Filtrar</div>
                    </div>
                    <div>
                      <div class="rd-range-wrap">
                        <div class="rd-range-title">Precio:</div>
                        <div class="rd-range-form-wrap">
                          <input class="rd-range-input rd-range-input-value-1" id="test" type="text" name="value-1"><span>S/. </span>
                        </div>
                        <div class="rd-range-divider"></div>
                        <div class="rd-range-form-wrap">
                          <input class="rd-range-input rd-range-input-value-2" type="text" name="value-2"><span>S/. </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>-->
                <!--<div class="col-md-6 col-lg-12">
                  <h5>Popular products</h5>
                  <div class="list-popular-product">
                    <div class="list-popular-product-item">
                      
                      <article class="product-minimal unit unit-spacing-md">
                        <div class="unit-left"><a class="product-minimal-figure" href="single-product.html"><img src="../util/images/product-mini-1-108x100.png" alt="" width="108" height="100"/></a></div>
                        <div class="unit-body">
                          <h6 class="product-minimal-title"><a href="single-product.html">Blueberries</a></h6>
                          <div class="product-minimal-price">$235.00</div>
                        </div>
                      </article>
                    </div>
                    <div class="list-popular-product-item">
                      
                      <article class="product-minimal unit unit-spacing-md">
                        <div class="unit-left"><a class="product-minimal-figure" href="single-product.html"><img src="../util/images/product-mini-2-108x100.png" alt="" width="108" height="100"/></a></div>
                        <div class="unit-body">
                          <h6 class="product-minimal-title"><a href="single-product.html">Avocados</a></h6>
                          <div class="product-minimal-price">$290.00</div>
                        </div>
                      </article>
                    </div>
                    <div class="list-popular-product-item">
                      
                      <article class="product-minimal unit unit-spacing-md">
                        <div class="unit-left"><a class="product-minimal-figure" href="single-product.html"><img src="../util/images/product-mini-3-108x100.png" alt="" width="108" height="100"/></a></div>
                        <div class="unit-body">
                          <h6 class="product-minimal-title"><a href="single-product.html">Bananas</a></h6>
                          <div class="product-minimal-price">$129.00</div>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>-->
              </div>
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
    <script src="js/cargarDatos.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>
    
  </body>
</html>