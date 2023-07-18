<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];
    $producto = $_POST['producto'];
    $aplicacion = $_POST['aplicacion'];
    $mensaje = $_POST['mensaje'];

    // Validar los datos
    if (empty($nombre) || empty($email) || empty($telefono) || empty($empresa) || empty($producto) || empty($aplicacion) || empty($mensaje)) {
        die('Por favor, complete todos los campos obligatorios.');
    }

    // Construir el mensaje de correo
    $to = 'contacto@powertugger.com';
    $subject = 'Mensaje de contacto desde el formulario';
    $message = "Nombre: $nombre\n";
    $message .= "Email: $email\n";
    $message .= "Teléfono: $telefono\n";
    $message .= "Empresa: $empresa\n";
    $message .= "Producto de interés: $producto\n";
    $message .= "Aplicación de uso: $aplicacion\n";
    $message .= "Mensaje: $mensaje\n";
    $headers = "From: $email\r\n";

    // Enviar el correo electrónico
    if (mail($to, $subject, $message, $headers)) {
        echo '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.';
    } else {
        echo 'Ha ocurrido un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.';
    }
} else {
    die('Acceso no autorizado.');
}
