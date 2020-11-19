<!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-modern-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="menu.principal.view.php"><img src="../images/logo.png" alt="" width="154" height="47"/></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search">
                      <!--<button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>-->
                      
                        <div class="form-wrap">
                          <label class="form-label" for="textproducto"></label>
                          <input class="form-input" id="textproducto" type="text" name="textproducto" placeholder="Buscar..." autocomplete="off">
                         <!-- <div class="rd-search-results-live" id="rd-search-results-live"></div>-->
                          <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                      
                    </div>
                    <!-- RD Navbar Nav-->
                
                        <!-- RD Navbar Basket-->
                        <div class="rd-navbar-basket-wrap">
                          <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span></span></button>
                          <!--<div id="numProductos_carrito"></div>-->
                          <div class="cart-inline">
                            <div class="cart-inline-header">
                              <div id="listarResumenCarrito"></div>
                            </div>
                            <div class="cart-inline-body">
                              <div class="cart-inline-item">
                                <div id="listarCarrito"></div>
                              </div>
                            </div>
                            <div class="cart-inline-footer">
                              <div class="group-sm">
                                <a class="button button-md button-default-outline-2 button-wapasha col-sm-12" href="carrito.compra.view.php">VER CARRITO
                                </a>
                                <!--<a class="button button-md button-primary button-pipaluk" href="checkout.html">Finalizar compra</a>-->
                              </div>
                            </div>
                          </div>
                        </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="carrito.compra.view.php"><span></span></a>
                
                    <div>
                        <!-- RD Navbar Nav-->
                        <ul class="rd-navbar-nav">
                         
                          <li class="rd-nav-item"><a class="rd-nav-link" href="#"><?php echo $resultado["correo"];  ?></a>
                            <!-- RD Navbar Dropdown-->
                            <ul class="rd-menu rd-navbar-dropdown">
                              <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="../view/mis.datos.view.php">Mis Datos</a></li>
                              <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="../view/cambiar.clave.view.php">Cambiar contrase&ntilde;a</a></li>
                              <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="../controller/sesion.cerrar.controller.php">Cerrar Sesi&oacute;n</a></li>
                            </ul>
                          </li>
                        </ul>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </nav>
        </div>
