
application/x-httpd-php enviar_correo_automatico.controller.php ( PHP script, UTF-8 Unicode text )
<?php
  

  
  $correo           = $_POST["p_email"];

$body = "Email: " . $correo;

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
        $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'pjavaa@gmail.com';                     // SMTP username
        $mail->Password   = '071ac04723Ac';                               // SMTP password
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
        $mail->setFrom('pjavaa@gmail.com', 'Renzo Ruiz'); // quién lo envía
        $mail->addAddress($correo);     // quién lo recibe
        
        $mail->addAddress('pjavaa@gmail.com');               // Name is optional
        /*
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        */
        // Attachments: para enviar archivos
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Recovery Mail - La Chuspita';
        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>
          alert("El mensaje se envio correctamente");
          window.history.go(-1);
          </script>';

        //echo 'El mensaje se envió correctamente';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }

?>