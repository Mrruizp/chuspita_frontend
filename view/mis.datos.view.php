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
              <h3 style="color: #ff4a4a">¡Hola!</h3>
              <p>Bienvenido a tu cuenta, aquí podrás administrar todos los datos necesarios para comprar en 
                <a href="menu-arriba.admin.view.php" style="color: #ff4a4a">lachuspita.pe
                </a>
              </p>
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-4-1" data-toggle="tab">Mis Datos</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#mi_pedido" data-toggle="tab">Mis Pedidos</a></li>
                  <!--<li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-4-3" data-toggle="tab">Mis listas</a></li>-->
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-4-1">
                    <section class=""> <!-- section section-md section-first bg-default text-md-left: alinear las letras -->
                      <div class="col-xs-2 col-lg-1">
                        <div class="form-wrap">
                          <div class="group-xs group-middle">
                            <button type="button" class="button button-primary button-block button-pipaluk" data-toggle="modal" data-target="#modal-misDatos" id="btnagregar">
                              <i class="fa fa-plus"> AGREGAR </i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <form id="" class="rd-form rd-mailform">
                      <div class="container">
                        <div class="row row-50 justify-content-center">
                          <div class="col-lg-10 col-lg-6">
                            
                            
                              <div class="row row-14 gutters-14">
                                
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Tipo de documento
                                    <input class="form-input" id="cbTipoDoc1" type="text" name="cbTipoDoc1" disabled>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Número de documento
                                    <input class="form-input" id="textNumDoc1" type="text" name="textNumDoc1" disabled="" maxlength="11"
                                    onkeypress="ValidaSoloNumeros();"/>
                                    <!--<label class="form-label" for="textNumDoc"></label>-->
                                  </div>
                                </div>
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Región
                                    <input class="form-input" type="text" id="textRegion1" name="textRegion1" disabled="">
                                    <!--<input class="form-input" id="cbDepartamento" type="text" name="cbDepartamento"  data-constraints="@Required"/>-->
                                  </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" id="estado_textNombres1" style="display:none;">
                                  <div class="form-wrap">Nombre personal
                                    <input class="form-input" id="textNombres1" type="text" name="textNombres1" disabled="">
                                    <!--<label class="form-label" for="textNombres">Nombres</label>-->
                                  </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" id="estado_nombre_comercial1" style="display:none;">
                                  <div class="form-wrap">Nombre comercial
                                    <input class="form-input" id="textNombreComercial1" type="text" name="textNombreComercial1" disabled="">
                                    <!--<label class="form-label" for="textNombres">Nombres</label>-->
                                  </div>
                                </div> 
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Provincia
                                    <input class="form-input" type="text" id="textProvincia1" name="textProvincia1" disabled="">
                                    <!--<input class="form-input" id="cbProvincia" type="text" name="cbProvincia" data-constraints="@Required"/>-->
                                  </div>
                                </div>
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Fecha de nacimiento:
                                    <input class="form-input" type="text" id="textFecNac1" name="textFecNac1" disabled="">

                                    <!--<label class="form-label" for="textFecNac"></label>-->
                                  </div>
                                </div>
                                
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Distrito
                                     <input class="form-input" type="text" id="textDistrito1" name="textDistrito1" disabled="">
                                    <!--<input class="form-input" id="cbDistrito" type="text" name="cbDistrito" data-constraints="@Required"/>-->
                                  </div>
                                </div>
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Teléfono fijo
                                    <input class="form-input" id="textTelFijo1" type="text" name="textTelFijo1" maxlength="9"
                                    onkeypress="ValidaSoloNumeros();" disabled="">
                                    <!--<label class="form-label" for="textTelFijo"></label>-->
                                  </div>
                                </div>
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Teléfono celular
                                    <input class="form-input" id="textTelCelular1" type="text" name="textTelCelular1" maxlength="9"
                                      onkeypress="ValidaSoloNumeros();" disabled="">
                                    <!--<label class="form-label" for="textTelCelular"></label>-->
                                  </div>
                                </div>
                                <div class="col-lg-6 col-lg-3">
                                  <div class="form-wrap">Dirección
                                    <input class="form-input" id="textDireccion1" type="text" name="textDireccion1" disabled="">
                                    <!--<label class="form-label" for="textDireccion"></label>-->
                                  </div>
                                </div>
                                                         
                                <div class="col-6 col-lg-6">Correo
                                  <div class="form-wrap">
                                    <input class="form-input" id="textCorreo1" type="text" name="textCorreo1" value="<?php echo $resultado["correo"];  ?>" disabled="">
                                    
                                  </div>
                                </div>
                              </div>
                              <!--<label class="checkbox-inline">
                                <input name="input-checkbox-1" value="checkbox-1" type="checkbox"/>My Billing Address and Shipping Address are the same
                              </label> -->
                            
                          </div>
                          
                            
                            </form>

                    </section>

                            <!-- INICIO del formulario modal -->
                            <small>
                                <form id="frmgrabar">
                                    <div class="modal fade" id="modal-misDatos">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header bg-red">
                                            <h4 class="modal-title text-white"><b></b>REGISTRAR MIS DATOS</b></b></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row row-14 gutters-14">
                                              <!--<div class="col-sm-6">
                                                <div class="form-wrap">Tipo Cliente
                                                  <select class="form-input" id="cbTipoCliente" name="cbTipoCliente" onChange="mostrar_tipo_cliente(this.value);">
                                                    <option>-</option   
                                                    <option value="<?php echo $_SESSION["t_cliente"];  ?>"> 

                                                      <?php 
                                                            if( $_SESSION["t_cliente"] == "J")
                                                              echo "Jurídica";
                                                            if( $_SESSION["t_cliente"] == "N")
                                                              echo "Natural";
                                                      ?>
                                                          
                                                    </option>
                                                    <option value="J">Jurídica</option>
                                                    <option value="N">Natural</option>
                                                  </select>
                                                </div>
                                              </div>-->
                                              <div class="col-sm-6">
                                                <div class="form-wrap">Tipo de documento
                                                  <br><select class="form-input" id="cbTipoDoc" name="cbTipoDoc" onChange="mostrar_tipo_cliente(this.value);">
                                                        <option value="<?php echo $_SESSION["t_doc"];  ?>">
                                                          <?php
                                                            if( $_SESSION["t_doc"] == "01")
                                                              echo "DNI";
                                                            if( $_SESSION["t_doc"] == "06")
                                                              echo "RUC";
                                                            if( $_SESSION["t_doc"] == "04")
                                                              echo "CARNET DE EXTRANGERÍA";
                                                            if( $_SESSION["t_doc"] == "07")
                                                              echo "PASAPORTE";
                                                          ?>
                                                        </option>
                                                        <option value="07">CARNET DE EXTRANGERÍA</option>
                                                        <option value="01">DNI</option>
                                                        <option value="06">RUC</option>
                                                        <option value="07">PASAPORTEC</option>
                                                      </select>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Número documento
                                                  <input class="form-input" id="textNumDoc" type="text" name="textNumDoc" required="" maxlength="11"
                                                    onkeypress="ValidaSoloNumeros();" required="">
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Región
                                                  <select class="form-input" id="cbRegion" name="cbRegion" 
                                                  onchange="cargarCbCodigoProvinciaDepartamento('#cbProvincia',this.value,'seleccione')">
                                                      <option value="<?php echo $_SESSION["codregion"];  ?>"><?php echo $_SESSION["region"];  ?></option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-6" id="estado_textNombres" style="display:none;">
                                                <div class="form-wrap">Nombres y apellidos
                                                  <input class="form-input" id="textNombres" type="text" name="textNombres">
                                                </div>
                                              </div>
                                              <div class="col-6" id="estado_nombre_comercial" style="display:none;">
                                                <div class="form-wrap">Nombre comercial
                                                  <input class="form-input" id="textNombreComercial" type="text" name="textNombreComercial">
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Provincia
                                                  <select class="form-input" id="cbProvincia" name="cbProvincia"
                                                    onchange="cargarCbCodigoDistritoProvincia('#cbDistrito',this.value,'seleccione')">
                                                      <option value="<?php echo $_SESSION["codprovincia"];  ?>"><?php echo $_SESSION["provincia"];  ?></option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Fecha nacimiento
                                                  <input class="form-input" type="date" id="textFecNac" name="textFecNac" required="">
                                                </div>
                                              </div>
                                              
                                              <div class="col-6">
                                                <div class="form-wrap">Distrito
                                                  <select class="form-input select-filter" id="cbDistrito" name="cbDistrito"> 
                                                      <option value="<?php echo $_SESSION["coddistrito"];  ?>"><?php echo $_SESSION["distrito"];  ?></option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Número teléfono fijo
                                                  <input class="form-input" id="textTelFijo" type="text" name="textTelFijo" maxlength="9"
                                                    onkeypress="ValidaSoloNumeros();" required="">
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Número celular
                                                  <input class="form-input" id="textTelCelular" type="text" name="textTelCelular" data-constraints="@Required" maxlength="9"
                                                    onkeypress="ValidaSoloNumeros();" required="">
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-wrap">Correo
                                                  <input class="form-input" id="textCorreo" type="text" name="textCorreo" value="<?php echo $resultado["correo"];  ?>">
                                                </div>
                                              </div>
                                              <div class="col-12">
                                                <div class="form-wrap">Dirección
                                                  <input class="form-input" id="textDireccion" type="text" name="textDireccion" required="">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer justify-content-center">
                                            <button type="submit" class="button-primary button-ujarak2 btn btn-outline-light text-center col-6">
                                              <i class="fa fa-save"> GUARDAR </i></button>


                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </form>
                            </small>
                            <!-- FIN del formulario modal -->

                            
                  </div>
                  <div class="tab-pane fade" id="mi_pedido">
                    
                    <div class="" id="listarPedidos">
                      
                    </div>
                    <!-- INICIO del formulario modal -->
                            <small>
                                
                                    <div class="modal fade" id="myModal_mis_pedidos">
                                      <div class="modal-dialog" style= "max-width: 1200px;">
                                        <div class="modal-content">
                                          <div class="modal-header bg-red"><!--bg-gray-dark-->
                                            <h4 class="modal-title text-white"><b></b>DETALLE DEL PEDIDO</b></b></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <section class="">
                                              <div class="container">
                                                <div class="row row-50 justify-content-center">
                                                  <div class="col-md-10 col-lg-6">
                                                    <h4 class="text-spacing-50">Datos Personales</h4>
                                                    <div class="box-radio">
                                                      <div class="radio-panel">
                                                        <label class="title">
                                                          <h7><b>Nombre y Apellido:</b> <?php echo $resultado["nombre"];?></h7>
                                                        </label>
                                                      </div>
                                                      <div class="radio-panel">
                                                        <label class="title">
                                                          <h7><b>Correo:</b> <?php echo $resultado["correo"];?></h7>
                                                        </label>
                                                      </div>
                                                      <div class="radio-panel">
                                                        <label class="title">
                                                          <h7><b>Teléfono:</b> <?php echo $resultado["telefono_celular"];?></h7>
                                                        </label>
                                                      </div>
                                                      <div class="radio-panel">
                                                        <label class="title">
                                                          <h7><b>Documento: </b><?php echo $resultado["nro_documento"];?></h7>
                                                        </label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-10 col-lg-6">
                                                    <h4 class="text-spacing-50">Datos de Envío</h4>
                                                    <div class="box-radio">
                                                      <div id="Lista_datos_envio_pedido"></div>
                                                  </div>
                                                  </div>

                                                  <div class="col-md-10 col-lg-12">
                                                    <div class="table-custom-responsive">
                                                      <div id="Listar_roductos_mis_pedidos"></div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-10 col-lg-12">
                                                    <div class="table-custom-responsive">
                                                      <div id="ListaTotales_carrito"></div>
                                                    </div>
                                                  </div>
                                                  <!--<div class="col-md-10 col-lg-6">
                                                    <div class="table-custom-responsive">
                                                      <button type="submit" class="button button-primary button-pipaluk col-lg-11">
                                                       <i class="fa fa-share-square-o"> REPETIR PEDIDO </i>
                                                      </button>-->
                                                      <!--<button type="submit" class="button button-secondary button-pipaluk col-lg-11">
                                                       <i class="fa fa-list-alt"> CONVERTIR EN LISTA </i>
                                                      </button>-->
                                                    </div>
                                                  </div>
                                                  
                                                </td><br/><br/><br/><br/></td><br/></div>

                                              </div>
                                            </section>
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                
                            </small>
                            <!-- FIN del formulario modal -->
                  </div>
                  <!--<div class="tab-pane fade" id="tabs-4-3">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <div class="text-center text-sm-left offset-top-30">
                      <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                        <li>Minim veniam</li>
                        <li>Nostrud exercitation</li>
                        <li>Eiusmod tempor</li>
                        <li>Dolore magna</li>
                        <li>Laboris nisi</li>
                        <li>Officia deserunt</li>
                      </ul>
                    </div>
                    <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Read more</a><a class="button button-width-xl-310 button-default-outline button-wapasha" href="contact-us.html">Contact us</a></div>
                  </div>-->
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
    <script src="js/mis.datos.js" type="text/javascript"></script>
    <script src="js/cbCodigo.js" type="text/javascript"></script>
    <script src="js/cargarDatos.js" type="text/javascript"></script>
    <script src="js/cargar.carrito_compra.js" type="text/javascript"></script>
    <script src="js/autocompletado.js" type="text/javascript"></script>
    
    
    <script type="text/javascript">
        function mostrar_tipo_cliente(cbTipoDoc) 
        {
            if (cbTipoDoc == "06") 
            {
                $("#estado_nombre_comercial1").show();
                $("#estado_nombre_comercial").show();
                $("#estado_textNombres1").hide();
                $("#estado_textNombres").hide();
            }else
                {
                    $("#estado_textNombres1").show();
                    $("#estado_textNombres").show();
                    $("#estado_nombre_comercial1").hide();
                    $("#estado_nombre_comercial").hide();
                }
                
        }
    </script>
    <script type="text/javascript">
            $(function() {
                $('#cbDistrito').select2();
            })
    </script>
   <!-- <script type="text/javascript">
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