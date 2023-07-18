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

        // Validar los campos del formulario según tus necesidades

        // Procesa el formulario y envía el correo electrónico
        $to = 'contacto@powertugger.com';
        $subject = 'Nuevo formulario de contacto';
        $message = "Nombre: $nombre\n";
        $message .= "Correo electrónico: $correo\n";
        $message .= "Teléfono: $telefono\n";
        $message .= "Empresa: $empresa\n";
        $message .= "Producto de interés: $producto\n";
        $message .= "Aplicación de uso: $aplicacion\n";

        // Envía el correo electrónico
        $sent = mail($to, $subject, $message);

        if ($sent) {
            // El correo se envió correctamente
            echo 'success'; // Puedes cambiar esto por cualquier otra respuesta o dejarlo en blanco
        } else {
            // Hubo un error al enviar el correo
            echo 'error'; // Puedes cambiar esto por cualquier otra respuesta o dejarlo en blanco
        }

        // Detiene la ejecución de la página para evitar que se renderice el contenido de la plantilla
        die();

    }

};
