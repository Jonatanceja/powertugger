<?php

return function ($kirby) {

    if ($kirby->request()->is('POST')) {
        // Obtén los datos del formulario
        $nombre = $kirby->request()->get('nombre');
        $correo = $kirby->request()->get('correo');
        $telefono = $kirby->request()->get('telefono');
        $empresa = $kirby->request()->get('empresa');
        $producto = $kirby->request()->get('producto');
        $aplicacion = $kirby->request()->get('aplicacion');
        $peso = $kirby->request()->get('peso');

        // Validar que todos los campos obligatorios estén completos
        if (empty($nombre) || empty($correo) || empty($telefono) || empty($empresa) || empty($producto) || empty($aplicacion) || empty($peso)) {
            echo 'error'; // Puedes cambiar esto por cualquier otra respuesta o mensaje de error
            die(); // Detiene la ejecución del script
        }

        // Procesa el formulario y envía el correo electrónico
        $to = 'contacto@powertugger.com, jonatanjonas@gmail.com';
        $subject = 'Nuevo formulario de contacto';
        $message = "Nombre: $nombre\n";
        $message .= "Correo electrónico: $correo\n";
        $message .= "Teléfono: $telefono\n";
        $message .= "Empresa: $empresa\n";
        $message .= "Producto de interés: $producto\n";
        $message .= "Aplicación de uso: $aplicacion\n";
        $message .= "Peso a mover: $peso\nkg";

        // Envía el correo electrónico
        $sent = mail($to, $subject, $message);

        if ($sent) {
            // El correo se envió correctamente
            go('descarga'); // Reemplaza 'tu-thank-you-page' con la ruta real de tu página de agradecimiento
        } else {
            // Hubo un error al enviar el correo
            echo 'error'; // Puedes cambiar esto por cualquier otra respuesta o mensaje de error
        }

        // Detiene la ejecución de la página para evitar que se renderice el contenido de la plantilla
        die();

    }

};
