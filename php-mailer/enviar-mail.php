<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

function enviar_correo($correo_destino, $nombre_usuario, $usuario, $pass){
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'cloud7soft@hotmail.com';                     // SMTP username
        $mail->Password   = 'morellonomicon07';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('cloud7soft@hotmail.com', 'Cloud Seven Soft');
        $mail->addAddress($correo_destino, $nombre_usuario);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('images/kirbo.jpg', 'prueba.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = utf8_decode('Recuperación de contraseña');
        $mail->Body = ' <h1> Hola '. $nombre_usuario .' </h1>
                        <br>
                        <p>Sus datos de inicio de sesi&oacuten son:</p>
                        <p><b>Usuario</b>: '. $usuario .'</p>
                        <p><b>Contrase&ntildea</b>: '. $pass .'</p>
                        <p>Si usted no solicit&oacute este correo, s&oacutelo ignorelo.</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){
            return 'datosEnviados';
        }else{
            return "mailerError";
        }
        
    } catch (Exception $e) {
        return "mailerError";
    }

}
