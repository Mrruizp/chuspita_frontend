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
        <?php include_once './menu-arriba.bodega-online.informacion.view.php'; ?>
      </header>
      <div class="page">
        <!-- Breadcrumbs -->
        <section class="breadcrumbs-custom-inset">
          <div class="breadcrumbs-custom context-dark bg-overlay-39">
            <div class="container">
              <h2 class="breadcrumbs-custom-title">Tu Bodega Online</h2>
              <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Inicio</a></li>
                <li class="active">Tu Bodega Online</li>
              </ul>
            </div>
            <!--<div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>-->
          </div>
        </section>
        <div class="section" id="proceso_compra">
          <div class="container">  
            <!-- How we work-->
            <section class="section section-md bg-default">
              <div class="container"><br/><br/><br/><br/>
                <h2>Proceso de Compra</h2>
                <div class="row row-30 row-sm justify-content-center box-ordered">
                  <div class="col-sm-6 col-md-5 col-lg-12">
                    <article class="box-icon-leah">
                      <div class="box-icon-leah-icon fl-bigmug-line-pin42"></div>
                      <h5 class="box-icon-leah-title">Cómo Ordenar</h5>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Busca tu producto colocando en la parte superior la denominacion del mismo
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Envialo al carrito de compras indicando la cantidad que deseas
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Verifica si el carrito de compras tiene todos los productos que necesitas
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Programa tu envio, eligiendo el dia y la hora de envio
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Elige tu medio de pago, colocas tus datos y realiza la compra.
                      </p>
                      <div class="box-icon-leah-count box-ordered-item"></div>
                    </article>
                  </div>
                  <div class="col-sm-6 col-md-5 col-lg-12">
                    <article class="box-icon-leah">
                      <div class="box-icon-leah-icon fl-bigmug-line-chat55"></div>
                      <h5 class="box-icon-leah-title">Medios de pago</h5>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Pago con tarjetas de debito o debito en la web o mediante el POS en el momento de la entrega.
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> Pago por yape
                      </p>
                      <div class="box-icon-leah-count box-ordered-item"></div>
                    </article>
                  </div>
                  <div class="col-sm-6 col-md-5 col-lg-12">
                    <article class="box-icon-leah">
                      <div class="box-icon-leah-icon fl-bigmug-line-images21"></div>
                      <h5 class="box-icon-leah-title">Servicios de entrega - Delivery</h5>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> 
                        Las entregas se realizarán AM o PM dependiendo del horario de tu compra.
                      </p>

                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon> 
                        Puede hacer sus pedidos desde las 06:00 p.m. del día anterior hasta las 11:59 a.m. del mismo día y recibirlos el mismo día PM de 2:00 p.m. a 8:00 p.m.
                      </p>

                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                        Los pedidos que realices después de las 12:01 p.m. hasta las 5:59 p.m. serán atendidos al día siguiente AM de 8:00 a.m. hasta las 2:00 p.m.
                      </p>

                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                        Ambos deliverys AM y PM tienen una capacidad de atención limitada (cuota) y que, si en algún horario se llena, se habilitara el siguiente horario (más próximo).
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                        El costo de envío se detalla al momento de finalizar la compra, dependiendo la ubicación del domicilio.
                      </p>
                      <p class="box-icon-leah-text" style="text-align: justify;">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                        Zonas iniciales de Reparto disponibles:  Miraflores, San Borja, Surco.
                      </p>
                      <div class="box-icon-leah-count box-ordered-item"></div>
                    </article>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="space" style="height: 300px"></div>

        <div class="section" id="catalogos">
          <div class="container">  
            <!-- How we work-->
            <section class="section section-md bg-default">
              <div class="container"><br/><br/><br/><br/>
                <h2>Catálogos</h2>
                
              </div>
            </section>
          </div>
        </div>
        <div class="space" style="height: 300px"></div>

        <div class="section" id="campañas">
          <div class="container">  
            <!-- How we work-->
            <section class="section section-md bg-default">
              <div class="container"><br/><br/><br/><br/>
                <h2>Campañas</h2>
                
              </div>
            </section>
          </div>
        </div>
        <div class="space" style="height: 300px"></div>

        <div class="section" id="preguntas">
        <section class="section section-lg section-first bg-default text-md-center">
          <div class="container"><br/><br/>
            <h2 class="text-center">Preguntas Frecuentes</h2>
            <div class="row">
              <div class="col-md-12 col-lg-6">
                <ul class="nav navbar-nav navbar-center">
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_1()"><small><b> 1. ¿Cómo puedo comprar por La Chuspita Online?</b></small></button>
                    <!--<input type="button" value="¿Cómo puedo comprar por La Chuspita Online?" class="btn-primary btn-xs" onclick="mostrar_1()" >-->
                    
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_2()" ><small><b> 2. ¿Puedo realizar compras desde el extranjero?</b></small></button>
                    
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_3()" ><small><b> 3. ¿Qué debo hacer en caso olvide mi contraseña?</b></small></button>
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_4()" ><small><b> 4. ¿El envío a domicilio tiene un costo?</b></small></button>
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_5()" ><small><b> 5. ¿Cuál es el monto de compra mínimo?</b></small></button>
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_6()" ><small><b> 6. ¿Cuáles son los horarios de entrega?</b></small></button>
                    <button class="button button-plomo col-md-10 text-left" onclick="mostrar_7()" ><small><b> 7. ¿Qué exploradores son compactibles?</b></small></button>

                </ul>
                
              </div>
              <div class="col-md-12 col-lg-6" id="preg_1" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        Para comprar en www.lachuspita.pe deberás seguir los siguientes pasos:<br/>
                        <b>Paso 1:</b> INGRESO, en caso no estés registrado, deberás ingresar tus datos haciendo clic en la opción "Regístrese aquí", deberás ingresar tu documento de identidad y tu clave en los campos en blanco.<br/><br/>
                        <b>Paso 2:</b> MI CUENTA, una vez que te hayas registrado en la tienda, deberás indicar tu dirección de despacho, además deberás identificar en el Mapa la dirección donde se enviará el pedido y hacer clic en "Entrar".<br/><br/>
                        <b>Paso 3:</b> MIS LISTAS, se mostrarán algunas opciones que te permitirán hacer tu compra de forma más rápida y sencilla.<br/>
                        Compras Internet, registro de todas las compras realizadas.<br/>
                        Mis Listas guardadas, al momento de agregar productos al Carrito de Compra, tendrás la opción de guardar esa lista con la finalidad de hacer mucho más rápidas tus futuras compras, además podrás crear las listas que desees. Por Ej. "Compra Semanal".<br/>
                        Listas Sugeridas, esta opción te permite encontrar listas de compras sugeridas por La Chuspita.com.pe, las cuales te ayudarán a hacer tu compra de manera rápida.<br/>
                        Recetas, esta opción te permite encontrar recetas de comida preparadas por La Chuspita para que simplemente se agreguen a tu Carro de Compras.<br/>
                        Deberás seleccionar todos los productos que desees comprar de cada una de tus listas y luego agregarlos al "Carro de Compras".<br/><br/>
                        <b>Paso 4:</b> SUPERMERCADO, aquí podrás navegar por las diferentes categorías de La Chuspita Online, ingresa a cada una de ellas y elige los productos. Los productos se agregarán al Carro de Compras haciendo clic en "Agregar".<br/>
                        Los productos perecibles contarán con un campo en el cual el cliente podrá indicar alguna sugerencia o comentario de como desea el producto. Ej. Papaya madura.<br/>
                        Además, podrás seleccionar el criterio de sustitución el cual te permitirá elegir una opción en caso no encuentres el producto deseado en el stock de la tienda.<br/><br/>
                        <b>Paso 5:</b> COMPRAR, una vez terminada la selección de productos en el Carro de Compra, hacer clic en "Ir a Comprar". En este paso, deberás seleccionar el día y hora de despacho. También deberás elegir la forma de pago, a través de una tarjeta de crédito o débito, por yape, o POS.
                    </p>  
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="preg_2" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        Sí, puedes realizar tus compras desde cualquier parte del mundo para ser entregados en la ciudad de Lima. Desde el exterior, aceptamos tarjetas de crédito Visa y MasterCard.<br/><br/>
                        ¿Qué medios de pago puedo usar cuando compro por la tienda virtual?<br/>
                        Para tu mayor comodidad contamos con diferentes formas de pago:<br/><br/>
                        2.1. Para clientes residentes en Lima<br/>
                        <ion-icon name="checkmark-outline"></ion-icon> Pago online: Sólo con tarjeta de Crédito Visa o MasterCard.<br/><br/>
                        <ion-icon name="checkmark-outline"></ion-icon> Pago contra entrega: Cuando desees realizar el pago al momento de la entrega de la mercadería y requieras hacerlo a través de una tarjeta de Crédito o Débito, podrás hacerlo a través del POS inalámbrico que llevaremos al lugar indicado para el despacho. Tu pedido podrá ser cancelado con cualquiera de estos medios de pago:<br/><br/>
                        Tarjetas de Crédito/Debito.<br/><br/>
                        <ion-icon name="checkmark-outline"></ion-icon> Yape: podrás escanear el QR de La Chuspita y realizar el pago<br/><br/>
                        2.2. Para clientes residentes en el extranjero<br/>
                        <ion-icon name="checkmark-outline"></ion-icon> Pagos online: Sólo con tarjeta de Crédito Visa o MasterCard.
                    </p>  
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="preg_3" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        Para recuperar tu clave secreta deberás ingresar al link "¿Olvidaste tu clave?" que aparece debajo de los recuadros asignados para el documento de identidad y la clave.<br/><br/>
                        El sistema pedirá que ingreses tu documento de identidad. Una vez ingresado, deberás responder la pregunta secreta que creaste en el registro inicial y nuestro sistema, luego de validar la respuesta, te enviará automáticamente un e-mail al correo que registraste con una nueva clave la cual deberás ingresar en el espacio asignado. <br/><br/>Te recomendamos cambiar la clave por una nueva que puedas recordar fácilmente.


                    </p>  
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="preg_4" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        Sí, el costo de envío se calcula de acuerdo a la distancia entre la dirección de despacho con la tienda con el servicio de La Chuspita.pe.
                    </p>  
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="preg_5" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        No existe ningún monto de compra mínimo.
                    </p>  
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="preg_6" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        Contamos con 4 horarios de entrega para tu mayor comodidad:<br/><br/>
                        <ion-icon name="checkmark-outline"></ion-icon>De 9 a.m. a 12:00 p.m.<br/>
                        <ion-icon name="checkmark-outline"></ion-icon>De 12:00 p.m. a 3:00 p.m.<br/>
                        <ion-icon name="checkmark-outline"></ion-icon>De 3:00 p.m. a 6:00 p.m.<br/>
                        <ion-icon name="checkmark-outline"></ion-icon>De 6:00 p.m. a 9:00 p.m.

                    </p>   
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="preg_7" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <p style="text-align: justify;">
                        Te recomendamos usar los siguientes navegadores para que tu experiencia por la tienda sea más fácil: Internet Explorer 7.0, 8.0, Mozilla Firefox. También puedes utilizar Google Chrome y Safari.
                    </p>  
                    <br/>
                </div>
              </div>
            </div>
            </div>
            </section>
          </div>
        <div class="space" style="height: 300px"></div>

        <div class="section" id="priv_seg">
        <section class="section section-lg section-first bg-default text-md-center">
          <div class="container"><br/><br/>
            <h2 class="text-center">Politicas de Privacidad y Seguridad</h2>
            <div class="row">
              <div class="col-md-12 col-lg-6">
                <ul class="nav navbar-nav navbar-center">
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarIntroduccion()"><small><b> Introducción</b></small></button>
                    <!--<input type="button" value="¿Cómo puedo comprar por La Chuspita Online?" class="btn-primary btn-xs" onclick="mostrar_1()" >-->
                    
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarTratamiento()" ><small><b> Tratamiento</b></small></button>
                    
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarDestinatarios()" ><small><b> Destinatarios</b></small></button>
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarLegislacion()" ><small><b> Legislación</b></small></button>
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarConservacion()" ><small><b> Información</b></small></button>
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarComunicacion()" ><small><b> Comunicación y Flujo</b></small></button>
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarConfidencialidad_Seguridad()" ><small><b> Confidencialidad y Seguridad</b></small></button>
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarDerecho_consentimiento()" ><small><b> Derechos y Consentimiento</b></small></button>
                    <button class="button button-plomo col-md-10 text-center" onclick="mostrarConsecuencias()" ><small><b> Consecuencias, Vigencias y otros</b></small></button>

                </ul>
                
              </div>
              <div class="col-md-12 col-lg-6" id="introduccion" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <h3 class="title text-left">Introducción</h3>
                      <p style="text-align: justify;">
                          En “LA CHUSPITA” RETAIL SAC (en adelante ““La Chuspita””), aseguramos la máxima reserva y protección sobre aquellos datos personales de los clientes/usuarios que sean ingresados en el sitio en Internet de su propiedad: http://www.lachuspita.pe
                          En este documento describimos la “Política de Privacidad” (en adelante, también denominado “Política” ) que regula el tratamiento de los datos personales que los clientes/usuarios registran en el sitio web.


                      </p>  
                      <br/>
                      <h3 class="title text-left">Objetivo</h3>
                      <p style="text-align: justify;">
                          En “La Chuspita” somos conscientes de la elevada consideración que tiene la privacidad de nuestros clientes/usuarios y de todas aquellas personas que se interesan por nuestros productos y servicios. Siendo consecuentes con esta consideración tenemos el compromiso de respetar su privacidad y proteger la confidencialidad de su información y datos personales. Es por ello que el objetivo de esta política de privacidad es dar a conocer a nuestros clientes/usuarios la manera en que se recogen, se tratan y se protegen los datos personales que a través de Internet son introducidos en la Web y en la aplicación móvil a su disposición.
                          Estamos interesados en ofrecer a nuestros clientes/usuarios el más alto nivel de seguridad y proteger la confidencialidad de los datos que nos aporta. Por ello, las relaciones comerciales se realizan en un entorno de servidor seguro bajo protocolo SSL (Secure Socket Layer), actualmente empleado por las empresas más importantes del mundo para realizar transacciones electrónicas seguras.
                          Nuestro sitio web ha sido creado y diseñado para facilitar todo tipo de información que es importante para los clientes/usuarios para la realización de su compra.

                      </p>

                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="tratamiento" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <h3 class="title text-left">FINALIDAD DE LOS TRATAMIENTOS DE LA INFORMACIÓN PERSONAL</h3>
                      <p style="text-align: justify;">
                          Las finalidades de tratamiento de los datos personales que nuestros clientes/usuarios introducen en los diferentes formularios de la web se orientan a gestionar las transacciones de compra de nuestros productos, contestación de sus consultas, peticiones y la atención de cualquier otro tipo de información que nos requieran a través de éstos.
                          Los datos personales proporcionados por nuestros clientes/usuarios en el proceso de compra mediante la web y aplicación, se almacenarán en los bancos de datos que forman parte del sistema de información de “La Chuspita” y serán tratados para poder llevar a cabo las finalidades expuestas anteriormente.
                          Los bancos de datos que están registrados actualmente ante la Autoridad de Protección de Datos Personales son los siguientes:
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> CLIENTES con código RNPDP-PJP N° 1680.
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> COLABORADORES con código RNPDP-PJP N° 1681.
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> CONTRO DE ACCESOS con código RNPDP-PJP N° 1682.
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> PROVEEDORES con código RNPDP-PJP N° 1683.
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> RECLUTAMIENTO DE COLABORADORES con código RNPDP-PJP N° 1684.
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> SEGURIDAD Y SALUD EN EL TRABAJO con código RNPDP-PJP N° 1685.
                      </p>
                      <p style="text-align: justify;">
                          <ion-icon name="return-down-forward-outline"></ion-icon> VIDEOVIGILANCIA con código RNPDP-PJP N° 1686.
                      </p>
                      <p style="text-align: justify;">

                          Cabe destacar que este apartado se actualizará conforme se hagan modificaciones en los bancos de datos.
                          La dirección del titular del banco de datos es la siguiente: Calle Tintoretto No.149 San Borja, provincia y departamento de Lima.
                          La información que se recaba a través de los formularios y/o documentos análogos alojados en el sitio web de “La Chuspita” se almacenarán en el banco de datos denominado CLIENTES, inscrito ante la Autoridad de Protección de Datos Personales con el código RNPDP-PJP N° 1680.
                          En ese sentido, los bancos de datos que contienen datos personales han sido inscritos en el Registro de Protección de Datos de la Autoridad de Protección de Datos Personales. Los datos personales que faciliten nuestros clientes/usuarios sólo podrán ser conocidos y manejados por el personal de “La Chuspita” que necesite conocer dicha información para poder enviar información o contestar las solicitudes de nuestros clientes/usuarios. Estos datos personales serán tratados de forma leal y lícita y no serán utilizados para otras finalidades incompatibles con las especificadas


                      </p>  
                      <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="destinatarios" style="display:none;">
                <div>
                  <!--<h3 class="title text-center">Introducción</h3>-->
                    <h3 class="title text-left">DESTINATARIOS DE LOS DATOS PERSONALES</h3>
                      <p style="text-align: justify;">
                          El destinatario de la información personal de los usuarios/clientes que se recopile mediante los formularios y/o documentos análogos es ““La Chuspita””.
                          La dirección de ““La Chuspita””, en condición de Titular del banco de datos personales al que puede dirigirse para revocar el consentimiento o ejercer sus derechos como titular de los datos personales, se encuentra identificado en el numeral 15 de la presente Política.

                      </p>  
                      <br/>

                      <p style="text-align: justify;">
                          El destinatario principal de la información personal de los Usuarios que se recopile mediante la Web o App es “La Chuspita”. Asimismo, pueden existir terceros destinatarios para realizar funciones en nombre y representación de “La Chuspita”, los cuales tienen acceso a la información personal necesaria para realizar sus funciones, pero no pueden usarla para fines diferentes a los señalados en la presente Política. 
                          En este sentido, usted podrá acceder a la lista completa de los terceros proveedores de servicios en la página web de “La Chuspita” www.lachuspita.pe  en el enlace llamado “Transferencia de Información a Empresas”. 
                          Es necesario precisar que los mencionados terceros tratarán la información personal de acuerdo con la presente Política y según lo permitido por la legislación de Protección de Datos Personales. 
                          La dirección de “La Chuspita”, en condición de Titular del banco de datos personales al que puede dirigirse para revocar el consentimiento o ejercer sus derechos como titular de los datos personales, se encuentra identificado en el numeral 15 de la presente Política. 


                      </p>  
                      <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="legislacion" style="display:none;">
                <div>
                  <h3 class="title text-left">LEGISLACIÓN</h3>
                              <p style="text-align: justify;">
                                  Esta política está regulada por la legislación peruana y en particular por:<br/><br/>
                                  <ion-icon name="checkmark-outline"></ion-icon> Ley N° 29733 – Ley de Protección de Datos Personales (en adelante, denominado “LPDP” ).<br/><br/>
                                  <ion-icon name="checkmark-outline"></ion-icon> Reglamento de la Ley N° 29733, aprobado por el Decreto Supremo N° 003-2013-JUS (en adelante, denominado “RLPDP” ).<br/><br/>
                                  <ion-icon name="checkmark-outline"></ion-icon> Directiva de Seguridad de la Información, aprobada por la Resolución Directoral N° 019-2013-JUS/DGPDP (en adelante, denominado “Directiva” ).<br/><br/>
                                  De acuerdo con la LPDP y el RLPDP, se entiende por datos personales toda información numérica, alfabética, gráfica, fotográfica, acústica, sobre hábitos personales, o de cualquier otro tipo concerniente a una persona natural /Jurídica que la identifica o la hace identificable a través de medios que pueden ser razonablemente utilizados.
                                  Asimismo, se entiende por tratamiento de datos personales a cualquier operación o procedimiento técnico, automatizado o no, que permite la recopilación, registro, organización, almacenamiento, conservación, elaboración, modificación, extracción, consulta, utilización, bloqueo, supresión, comunicación por transferencia o por difusión o cualquier otra forma de procesamiento que facilite el acceso, correlación o interconexión de los datos personales.
                                  ““La Chuspita”” desarrolla su política de tratamiento de datos personales en atención a los principios rectores establecidos en la Ley Nº 29733 - Ley de Protección de Datos Personales, por lo tanto: <br/><br/>
                                  <ion-icon name="checkbox-outline"></ion-icon>  De acuerdo al principio de legalidad, rechaza la recopilación de los datos personales de nuestros Clientes/Usuarios por medios fraudulentos, desleales o ilícitos.<br/><br/>
                                  <ion-icon name="checkbox-outline"></ion-icon>  Conforme al principio de consentimiento, en el tratamiento de los datos personales de nuestros Clientes/Usuarios mediarán su consentimiento.<br/><br/> 
                                  <ion-icon name="checkbox-outline"></ion-icon>  Los datos personales de nuestros Clientes/Usuarios se recopilarán para una finalidad determinada, explícita y lícita, y no se extenderá a otra finalidad que no haya sido la establecida de manera inequívoca como tal al momento de su recopilación, excluyendo los casos de actividades de valor histórico, estadístico o científico cuando se utilice un procedimiento de disociación o anonimización.<br/><br/> 
                                  <ion-icon name="checkbox-outline"></ion-icon>  Todo tratamiento de datos personales de nuestros Clientes/Usuarios será adecuado, relevante y no excesivo a la finalidad para la que estos hubiesen sido recopilados. <br/><br/>
                                  <ion-icon name="checkbox-outline"></ion-icon>  Los datos personales que vayan a ser tratados serán veraces, exactos y, en la medida de lo posible, actualizados, necesarios, pertinentes y adecuados respecto de la finalidad para la que fueron recopilados. Se conservarán de forma tal que se garantice su seguridad y solo por el tiempo necesario para cumplir con la finalidad del tratamiento. <br/><br/>
                                  <ion-icon name="checkbox-outline"></ion-icon>  ““La Chuspita”” y, en su caso, los encargados de su administración, adoptan las medidas técnicas, organizativas y legales necesarias para garantizar la seguridad y confidencialidad de los datos personales. ““La Chuspita”” cuenta con las medidas de seguridad apropiadas y acordes con el tratamiento que se vaya a efectuar y con la categoría de datos personales de que se trate. <br/><br/>
                                  <ion-icon name="checkbox-outline"></ion-icon>  ““La Chuspita”” informa a sus Clientes/Usuarios que pueden ejercer sus derechos contenidos en el derecho constitucional a la protección de datos personales en sede administrativa ante la Autoridad Nacional de Protección de Datos y en sede jurisdiccional ante el Poder Judicial a los efectos del inicio del correspondiente proceso de habeas data. <br/><br/>
                                  <ion-icon name="checkbox-outline"></ion-icon>  ““La Chuspita”” garantiza el nivel adecuado de protección de los datos personales de sus Usuarios para el flujo transfronterizo de datos personales, con un mínimo de protección equiparable a lo previsto por la Ley Nº 29733 o por los estándares internacionales de la materia. <br/><br/>


                              </p>  
                              <br/>
                          </div>
                    </div>
                    <div class="col-md-12 col-lg-6" id="conservacion" style="display:none;">
                      <div>
                        <h3 class="title text-left">TIEMPO DE CONSERVACIÓN DE SUS DATOS PERSONALES</h3>
                          <p style="text-align: justify;">
                              Los datos personales del cliente/usuario serán conservados en los términos establecidos en la LPDP y el RLPDP, en el tiempo que sea necesario para cumplir las finalidades identificadas en el punto número 8 de la presente Política.<br/>
                              “La Chuspita”, en condición de Titular del banco de datos, se abstendrá de conservar los datos personales del Consumidor/titular en los siguientes eventos:<br/><br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Cuando tenga conocimiento de su carácter inexacto o incompleto, sin perjuicio de los derechos del cliente/usuario al respecto<br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Cuando los datos personales objeto de tratamiento hayan dejado de ser necesarios o pertinentes para el cumplimiento de las finalidades previstas en la presente Política, salvo medie procedimiento de anonimización o disociación.<br/><br/>
                              La supresión no procede cuando los datos personales deban ser conservados en virtud de un mandato legal o en virtud de las relaciones contractuales entre “La Chuspita”, en condición de responsable del tratamiento y el Titular de los datos personales, que justifiquen el tratamiento de estos, con fundamento en el Artículo 69 del RLPDP.
. 
                          </p>  
                          <br/>
                          <h3 class="title text-left">INFORMACIÓN QUE RECOLECTAMOS</h3>
                          <p style="text-align: justify;">
                              “La Chuspita”, como responsable del tratamiento, a través de los formularios subidos en nuestra página web y en documentos análogos, así como a través de proveedores de servicios, redes sociales, registros públicos y fuentes accesibles al público, puede recopilar los siguientes datos:<br/><br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Nombres<br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Dirección<br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Teléfono<br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Correo electrónico<br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Genero<br/>
                              <ion-icon name="checkmark-outline"></ion-icon> Número de documento de identidad<br/><br/>
                              Adicionalmente, en el futuro y para actividades comerciales específicas “La Chuspita” podrá recopilar otros datos personales a fin de darles tratamiento en el marco de dichas campañas. En estos casos, “La Chuspita” informará oportunamente al cliente -en momento previo a la obtención del consentimiento- sobre la finalidad y tratamientos que brindará a dicha información y, adicionalmente, actualizará esta sección de la presente Política de Privacidad describiendo dichos datos adicionales a fin que sean conocidos por nuestros clientes.
                          </p>  
                          <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="comunicacion" style="display:none;">
                <div>
                  <h3 class="title text-left">COMUNICACIÓN POR TRANSFERENCIA DE DATOS PERSONALES Y TRATAMIENTOS POR ENCARGO</h3>
                    <p style="text-align: justify;">
                        En “La Chuspita” respetamos la privacidad de nuestros clientes/usuarios, no transferimos su información a terceros si usted no desea expresamente que lo hagamos.<br/><br/>
                        Asimismo, es conveniente que nuestros clientes/usuarios sepan que sus datos personales podrán ser comunicados por transferencia a las entidades administrativas, autoridades judiciales y/o policiales, siempre y cuando esté establecido por Ley.<br/><br/>
                        Sin perjuicio de lo expresado, comunicamos a nuestros clientes/usuarios que a fin de gestionar de modo más eficiente las transacciones y operaciones comerciales en nuestra plataforma digital, y cumplir con sus expectativas de compra, “La Chuspita” podrá valerse de proveedores de servicios (los cuales fueron detallados en el punto 3 de la presente Política) a fin de llevar adelante ciertas actividades propias de la actividad comercial. En consecuencia, respecto a los datos personales de nuestros clientes/usuarios estos proveedores tendrán la condición de encargados de tratamiento de acuerdo a las disposiciones de la LPDP y el RLPDP.

. 
                    </p>  
                    <br/>
                    <h3 class="title text-left">FLUJO TRANSFRONTERIZO DE DATOS PERSONALES</h3>
                    <p style="text-align: justify;">
                        La información personal que se recopila mediante los formularios, cupones de descuentos y/o documentos análogos alojados en el sitio web de “La Chuspita” se almacena en nuestro servidor de BlueHosting.
                    </p>  
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="confidencialidad_seguridad" style="display:none;">
                <div>
                  <h3 class="title text-left">CONFIDENCIALIDAD DE LOS DATOS PERSONALES</h3>
                    <p style="text-align: justify;">
                        Los datos personales facilitados por los clientes/usuarios serán tratados con total confidencialidad. “La Chuspita” se compromete a guardar secreto profesional indefinidamente respecto de los mismos y garantiza el deber de guardarlos adoptando todas las medidas de seguridad necesarias.

  . 
                    </p>  
                    <br/>
                    <h3 class="title text-left">SEGURIDAD DE LOS DATOS PERSONALES</h3>
                    <p style="text-align: justify;">
                        En cumplimiento de la normativa vigente, en “La Chuspita” hemos adoptado las medidas técnicas de seguridad apropiadas a la categoría de los datos personales necesarias para mantener el nivel de seguridad requerido, con el objetivo de evitar la alteración, pérdida o el tratamiento o accesos no autorizados que puedan afectar a la integridad, confidencialidad y disponibilidad de la información.<br/><br/>
                        En “La Chuspita” tenemos implementadas todas las medidas de índole legal, técnica y organizativa necesarias para garantizar la seguridad de los datos personales y evitar su alteración, pérdida y tratamiento y/o acceso no autorizado, teniendo en cuenta el estado de la tecnología, la naturaleza de los datos almacenados y los riesgos a que están expuestos, ya sea que provengan de la acción humana, del medio físico o natural, tal y como establece la legislación peruana vigente de protección de datos personales.<br/><br/>
                        En “La Chuspita” también tenemos implementadas medidas de seguridad adicionales para reforzar la confidencialidad e integridad de la información y continuamente mantenemos la supervisión, control y evaluación de los procesos para asegurar la privacidad de los datos personales. Sin embargo, la transmisión de información mediante las redes de comunicación y de Internet no es totalmente segura; por eso, y a pesar de que en “La Chuspita” realizamos los mejores esfuerzos para proteger los datos personales, no podemos garantizar la seguridad de los mismos durante el tránsito hasta el sitio web.<br/><br/>
                        En tal sentido, toda la información nuestros los clientes/usuarios proporcionen, se enviará por su cuenta y riesgo. Es por ello que en “La Chuspita” recomendamos la máxima diligencia a nuestros clientes/usuarios cuando trasladen a terceros o publiquen información personal para evitar poner en riesgo sus datos personales, eludiendo, “La Chuspita”, de toda responsabilidad en caso de sustracciones, modificaciones o pérdidas de datos ilícitas.
                    </p> 
                    <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="derecho_consentimiento" style="display:none;">
                <div>
                  <h3 class="title text-left">EJERCICIO DE DERECHOS</h3>
                    <p style="text-align: justify;">
                        Los clientes/usuarios que nos hayan facilitado sus datos personales, pueden dirigirse a “La Chuspita”, con el fin de poder ejercer sus derechos de información, actualización, acceso, rectificación, de impedir el suministro de sus datos personales, de oposición al tratamiento o de tratamiento objetivo de los datos, en los términos recogidos en la legislación peruana vigente.
                        <br/><br/>
                        Los clientes/usuarios podrán ejercer sus derechos presentando una solicitud escrita en nuestra oficina principal, ubicada en Calle Tintoretto No.149, San Borja en el horario establecido para la atención al público o mediante el envío del formato debidamente llenado al correo electrónico:  servicioalclienteonline@lachuspita.pe

. 
                    </p>  
                    <br/>
                    <h3 class="title text-left">MENORES DE EDAD</h3>
                    <p style="text-align: justify;">
                        En “La Chuspita” entendemos la importancia de proteger la privacidad de los niños, especialmente en un entorno online. Por este motivo, nuestro sitio web no está diseñado ni dirigido a menores de 14 años. “La Chuspita” no llevará a cabo voluntariamente el tratamiento de datos personales relativos a menores de edad. En el supuesto que tengamos conocimiento que los datos personales recogidos corresponden a un menor de edad sin autorización, adoptaremos las medidas oportunas para eliminar estos datos tan pronto como sea posible.
                    </p> 
                    <br/>

                    <h3 class="title text-left">CONSENTIMIENTO</h3>
                      <p style="text-align: justify;">
                          Al aceptar esta Política de Privacidad, nuestros clientes/usuarios están de acuerdo con todos los aspectos expuestos en este documento y nos autorizan a tratar sus datos de carácter personal para las finalidades expuestas anteriormente.<br/><br/>
                          El cliente/usuario titular de la información, autoriza expresamente a “La Chuspita”, a realizar el tratamiento de sus datos personales identificados en la presente Política, ejecutando actividades tales como recopilar, registrar, organizar, almacenar, conservar, elaborar, modificar, extraer, consultar, utilizar, bloquear, suprimir, comunicar por transferencia, difundir, o cualquier otra forma de procesamiento que facilite el acceso, correlación o interconexión de los datos personales de forma parcial o total, en los términos expresados en la presente Política.
                      </p> 
                      <br/>
                </div>
              </div>
              <div class="col-md-12 col-lg-6" id="consecuencia_vigencia_otros" style="display:none;">
                <div>
                  <h3 class="title text-left">LAS CONSECUENCIAS DE PROPORCIONAR SUS DATOS PERSONALES Y SU NEGATIVA A HACERLO</h3>
                    <p style="text-align: justify;">
                        La Política de Privacidad web de “La Chuspita” ha sido actualizada el mes de octubre del 2020.
                        <br/><br/>
                        Usted en condición de titular de los datos personales puede negarse a proporcionar sus datos personales a “La Chuspita”. Por lo que este último se abstendrá de realizar el tratamiento de sus datos personales, en caso de negarse a aceptar la presente Política que contiene el consentimiento para tratamiento de datos personales. En este sentido, como consecuencia de dicha acción, usted no podrá acceder al servicio proporcionado por “La Chuspita” toda vez que para el desarrollo del servicio resulta imprescindible contar con los datos personales del titular.
                    </p>  
                    <br/>
                    <h3 class="title text-left">VIGENCIA Y MODIFICACIÓN DE LA PRESENTE POLÍTICA DE PRIVACIDAD</h3>
                    <p style="text-align: justify;">
                        La Política de Privacidad web de “La Chuspita” ha sido actualizada el mes de octubre del 2020.<br/><br/>
                        “La Chuspita” se reserva el derecho a modificar su Política de Privacidad web en el supuesto de que exista un cambio en la legislación vigente, doctrinal, jurisprudencial o por criterios propios empresariales. Si se introdujera algún cambio en esta Política, el nuevo texto se publicará en este mismo web. Se recomienda a nuestros clientes/usuarios que accedan periódicamente a esta Política de privacidad que encontraran en este mismo sitio web.
                    </p> 
                    <br/>
                    <h3 class="title text-left">OTROS</h3>
                    <p style="text-align: justify;">
                        Para realizar cualquier tipo de consulta respecto a esta política puede dirigirse a la siguiente dirección de correo electrónico: servicioalclienteonline@lachuspita.pe.
                    </p> 
                    <br/>
                </div>
              </div>
            </div>
            </div>
            </section>
          </div>
        <div class="space" style="height: 300px"></div>


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

    <script type="text/javascript">

      function mostrarIntroduccion() {
          document.getElementById('introduccion').style.display = 'block';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';
          
      }

      function mostrarTratamiento() {
          document.getElementById('tratamiento').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';          
      }

      function mostrarDestinatarios() {
          document.getElementById('destinatarios').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';

      }

      function mostrarLegislacion() {
          document.getElementById('legislacion').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';
          
      }

      function mostrarConservacion() {
          document.getElementById('conservacion').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';


      }


      function mostrarComunicacion() {

          document.getElementById('comunicacion').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';


      }

      function mostrarConfidencialidad_Seguridad() {
          document.getElementById('confidencialidad_seguridad').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';

      }

      function mostrarDerecho_consentimiento() {
          document.getElementById('derecho_consentimiento').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('consecuencia_vigencia_otros').style.display = 'none';

      }

      function mostrarConsecuencias() {
          document.getElementById('consecuencia_vigencia_otros').style.display = 'block';
          document.getElementById('introduccion').style.display = 'none';
          document.getElementById('tratamiento').style.display = 'none';
          document.getElementById('destinatarios').style.display = 'none';
          document.getElementById('legislacion').style.display = 'none';
          document.getElementById('conservacion').style.display = 'none';
          document.getElementById('comunicacion').style.display = 'none';
          document.getElementById('confidencialidad_seguridad').style.display = 'none';
          document.getElementById('derecho_consentimiento').style.display = 'none';


      }

      function mostrar_1() {
          document.getElementById('preg_1').style.display = 'block';
          document.getElementById('preg_2').style.display = 'none';         
          document.getElementById('preg_3').style.display = 'none';
          document.getElementById('preg_4').style.display = 'none';
          document.getElementById('preg_5').style.display = 'none';
          document.getElementById('preg_6').style.display = 'none';
          document.getElementById('preg_7').style.display = 'none';

      }

      function mostrar_2() {
          document.getElementById('preg_2').style.display = 'block';
          document.getElementById('preg_1').style.display = 'none';
          document.getElementById('preg_3').style.display = 'none';
          document.getElementById('preg_4').style.display = 'none';
          document.getElementById('preg_5').style.display = 'none';
          document.getElementById('preg_6').style.display = 'none';
          document.getElementById('preg_7').style.display = 'none';

      }

      function mostrar_3() {
          document.getElementById('preg_3').style.display = 'block'
          document.getElementById('preg_1').style.display = 'none';;
          document.getElementById('preg_2').style.display = 'none';
          document.getElementById('preg_4').style.display = 'none';
          document.getElementById('preg_5').style.display = 'none';
          document.getElementById('preg_6').style.display = 'none';
          document.getElementById('preg_7').style.display = 'none';

      }

      function mostrar_4() {
          document.getElementById('preg_4').style.display = 'block';
          document.getElementById('preg_1').style.display = 'none';
          document.getElementById('preg_2').style.display = 'none';
          document.getElementById('preg_3').style.display = 'none';
          document.getElementById('preg_5').style.display = 'none';
          document.getElementById('preg_6').style.display = 'none';
          document.getElementById('preg_7').style.display = 'none';

      }

      function mostrar_5() {
          document.getElementById('preg_5').style.display = 'block';
          document.getElementById('preg_1').style.display = 'none';
          document.getElementById('preg_2').style.display = 'none';
          document.getElementById('preg_3').style.display = 'none';
          document.getElementById('preg_4').style.display = 'none';
          document.getElementById('preg_6').style.display = 'none';
          document.getElementById('preg_7').style.display = 'none';

      }

      function mostrar_6() {
          document.getElementById('preg_6').style.display = 'block';
          document.getElementById('preg_1').style.display = 'none';
          document.getElementById('preg_2').style.display = 'none';
          document.getElementById('preg_3').style.display = 'none';
          document.getElementById('preg_4').style.display = 'none';
          document.getElementById('preg_5').style.display = 'none';
          document.getElementById('preg_7').style.display = 'none';

      }

      function mostrar_7() {
          document.getElementById('preg_7').style.display = 'block';
          document.getElementById('preg_1').style.display = 'none';
          document.getElementById('preg_2').style.display = 'none';
          document.getElementById('preg_3').style.display = 'none';
          document.getElementById('preg_4').style.display = 'none';
          document.getElementById('preg_5').style.display = 'none';
          document.getElementById('preg_6').style.display = 'none';

      }

    </script>
   <script src="../util/plugins/smooth-scroll-master/dist/smooth-scroll.polyfills.js"></script>
    <script>
      var scroll = new SmoothScroll('a[href*="#"]');
    </script>
  </body>
</html>