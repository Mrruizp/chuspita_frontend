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
      <!-- Page Header-->
        <!-- Why choose us-->
      <section class="section section-xs section-first bg-default"><!-- section section-md section-first bg-default-->
        <div class="container">
          <div class="row row-90 justify-content-center">
            <!--<div class="col-md-10 col-lg-5 col-xl-6"><img src="images/about-1-519x446.jpg" alt="" width="519" height="446"/>
            </div>-->
            <div class="col-md-12 col-lg-12 col-xl-12">
              <h3 style="color: #ff4a4a">Cambiar Contraseña!</h3>
              <p>Aquí podrá cambiar su contraseña; Ingrese su nueva contraseña y confirme.
                </a>
              </p><br><br>
              <!-- Bootstrap tabs-->
              
               
                <!-- Tab panes-->
                <div class="tab-content">
                    <section class=""> <!-- section section-md section-first bg-default text-md-left: alinear las letras -->
                      <div class="justify-content-center">
                        <div class="box-pricing box-pricing-popular">
                          <div class="box-pricing-body">
                            <div class="box-pricing-caption">
                            </div>
                            <!--<div class="divider divider-35"></div> -->
                            <form id = "frmgrabarCambiarClave" class=""> <!-- rd-form rd-mailform: le da la ubicación de los textos -->
                              
                              <div class="rd-form rd-mailform">Nueva Contraseña
                                <div class="form-wrap">
                                  <input type="hidden" name="textCorreo" id="textCorreo" value="<?php echo $resultado["correo"];  ?>">
                                  <input type="password" class="form-input" id="textClave" name="textClave" required>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-center">
                                <button type="submit" class="button-primary button-ujarak2 btn btn-outline-light text-center col-8">
                                  GUARDAR </button>
                              </div>
                            </form><br><br>
                            </div>
                        </div>
                      </div>
                    </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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

    <!-- Colocar en disable a los input según el valor de un combo
    <script type="text/javascript">
          $(document).ready(function() {
              $('#id_categoria').change(function(e) {
                if ($(this).val() === "1") {
                  
                  $('#textRazonSocial').prop("disabled", true);
                  $('#textRuc').prop("disabled", true);
                  $('#cbDepartamentoEmp').prop("disabled", true);
                  $('#cbProvinciaEmp').prop("disabled", true);
                  $('#cbDistritoEmp').prop("disabled", true);
                  $('#textDireccionEmp').prop("disabled", true);
                  $('#textTelFijoEmp').prop("disabled", true);
                  $('#textTelCelularEmp').prop("disabled", true);
                } else {
                  
                  $('#textRazonSocial').prop("disabled", false);
                  $('#textRuc').prop("disabled", false);
                  $('#cbDepartamentoEmp').prop("disabled", false);
                  $('#cbProvinciaEmp').prop("disabled", false);
                  $('#cbDistritoEmp').prop("disabled", false);
                  $('#textDireccionEmp').prop("disabled", false);
                  $('#textTelFijoEmp').prop("disabled", false);
                  $('#textTelCelularEmp').prop("disabled", false);
                }
              })
            });
    </script>
  -->
  </body>
</html>