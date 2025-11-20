<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Cargar autoloader de Composer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanitizar datos
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Validar campos
    if (empty($name) || empty($email) || empty($message)) {
        die("Error: Todos los campos son obligatorios.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: El correo electrónico no es válido.");
    }

    // Configurar PHPMailer
    $mail = new PHPMailer(true);

    try {
        // === Configuración del servidor SMTP ===
        // Ejemplo con Gmail (puedes cambiarlo a tu proveedor)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';          // Servidor SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tu-cuenta@gmail.com';     // Tu correo (debe permitir apps menos seguras o tener contraseña de app)
        $mail->Password   = 'tu-contraseña-o-app-password'; // Contraseña o "App Password" si usas 2FA
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // === Destinatario ===
        $mail->setFrom($email, $name);                 // Quien envía (el usuario)
        $mail->addAddress('tu-correo@dominio.com');    // Tú recibes el mensaje

        // === Contenido del correo ===
        $mail->isHTML(false); // Enviar como texto plano
        $mail->Subject = "Nuevo mensaje de contacto de $name";
        $mail->Body    = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";

        // Enviar correo
        $mail->send();

        // Redirigir a página de agradecimiento
        header("Location: gracias.html");
        exit;

    } catch (Exception $e) {
        // En caso de error, redirigir con mensaje (opcional: podrías usar una página de error)
        error_log("Error al enviar correo: " . $mail->ErrorInfo);
        die("Error: No se pudo enviar el mensaje. Inténtalo más tarde.");
    }
} else {
    header("Location: ./");
    exit;
}
?>
