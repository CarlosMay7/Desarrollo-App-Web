<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    /**
     * Contiene el email
     *
     * @var mixed
     */
    public $email;

    /**
     * Contiene el nombre del usuario
     *
     * @var string
     */
    public $nombre;

    /**
     * Contiene el token
     *
     * @var string
     */
    public $token;
    
    /**
     * Objeto de la clase Email
     *
     * @param string $email
     * @param string $nombre
     * @param string $token
     */
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    /**
     * Envía la confirmación
     *
     * @return void
     */
    public function enviarConfirmacion() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();  
        $mail->Host = $_ENV['MAILT_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['MAILT_PORT'];
        $mail->Username = $_ENV['MAILT_USER'];
        $mail->Password = $_ENV['MAILT_PASS'];

        $mail->setFrom('cuentas@concentus.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Registrado Correctamente tu cuenta en Concentus; pero es necesario confirmarla</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";       
        $contenido .= "<p>Si tu no creaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();

    }

    /**
     * Envia instrucciones
     *
     * @return void
     */
    public function enviarInstrucciones() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['MAILT_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['MAILT_PORT'];
        $mail->Username = $_ENV['MAILT_USER'];
        $mail->Password = $_ENV['MAILT_PASS'];
    
        $mail->setFrom('cuentas@concentus.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu contraseña';

        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu contraseña, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['HOST'] . "/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}