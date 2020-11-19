
application/x-httpd-php enviar_correo_automatico.pedido.controller.php ( PHP script, UTF-8 Unicode text )
<?php
  /*
    echo '<pre>';
    echo 'Datos que llegan por POST';
    print_r($_POST);
   */
  $p_nro_pedido          = $_POST["pnro_pedido"];
  $p_tipo_documento      = $_POST["ptipo_documento"];
  $p_nro_documento       = $_POST["pnro_documento"];
  $p_nombre              = $_POST["pnombre"];
  $p_telefono_celular    = $_POST["ptelefono_celular"];
  $p_correo              = $_POST["pcorreo"];
  $p_observacion         = $_POST["pobservacion"];
  $p_direccion_entrega   = $_POST["pdireccion_entrega"];
  $p_referencia_entrega  = $_POST["preferencia_entrega"];
  $p_descripcion         = $_POST["pdescripcion"];
  $p_precio              = $_POST["pprecio"];
  $p_p_cantidad          = $_POST["pp_cantidad"];
  $p_total_venta         = $_POST["ptotal_venta"];
  $p_inafecto            = $_POST["pinafecto"];
  $p_gravado             = $_POST["pgravado"];
  $p_exonerado           = $_POST["pexonerado"];
  $p_subtotal            = $_POST["psubtotal"];
  $p_igv                 = $_POST["pigv"];
  $p_redondeo            = $_POST["predondeo"];
  $p_tarifa              = $_POST["ptarifa"];
  $p_importe_total       = $_POST["pimporte_total"];
  
$body = "Numero Pedido: " . $p_nro_pedido . "<br>Tipo Documento: 
        " . $p_tipo_documento. "<br>Numero Documento: 
        " . $p_nro_documento. "<br>Nombres y Apellidos: " . $p_nombre. "<br>Telefono Celular: " . $p_telefono_celular. "<br>Correo: 
        " . $p_correo. "<br>Persona que recibe el pedido: " . $p_observacion. "<br>Direccion de entrega: 
        " . $p_direccion_entrega. "<br>Referencia de Entrega: " . $p_referencia_entrega. "<br>Importe Total: 
        " . $p_importe_total;
        
        

//$body = "Clave: " . $clave;

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../view/PHPMailer/Exception.php';
  require '../view/PHPMailer/PHPMailer.php';
  require '../view/PHPMailer/SMTP.php';


    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer();

    try {
        //Server settings
        // accesos
        $mail->SMTPDebug = 2;   // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Debugoutput = 'html';
        $mail->Host = 'mail.lachuspita.pe';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'reclamos@lachuspita.pe';   // SMTP username
        $mail->Password   = 'Reclamos2020.';                               // SMTP password
        //$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        
        $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

        //$mail->SMTPAuth = true;
        
        //Recipients
        $mail->setFrom('reclamos@lachuspita.pe', 'Pedidos La Chuspita'); // quién lo envía
        $mail->addAddress($p_correo);     // quién lo recibe
        
        //$mail->addCC('reclamos@lachuspita.pe');
        //$mail->addAddress('renzorp_14@hotmail.com');
        //$mail->addAddress('reclamos@bodhi.pe');
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Recibimos tu orden de compra -  La Chuspita';
        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        if(!$mail->send()) {
            echo 'No se pudo enviar el mensaje...'.$mail->ErrorInfo;
        } else {
            echo 'El mensaje se envió!';
        }
        
        //$mail->send();
        echo '<script>
          alert("El mensaje se envio correctamente");
          window.history.go(-1);
          </script>';

        //echo 'El mensaje se envió correctamente';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }

?>