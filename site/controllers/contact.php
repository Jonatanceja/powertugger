<?php

return function ($kirby) {
    if ($kirby->request()->is('POST')) {
        $data = $kirby->request()->data();
        
        // Aquí puedes validar los datos del formulario antes de enviarlos
        
        // Aquí puedes procesar y enviar el correo electrónico con los datos del formulario
        $to = 'contacto@powertugger.com';
        $subject = 'Nuevo mensaje del formulario';
        $message = "Nombre: {$data['nombre']}\n";
        $message .= "Correo electrónico: {$data['correo']}\n";
        $message .= "Teléfono: {$data['telefono']}\n";
        $message .= "Empresa: {$data['empresa']}\n";
        
        // Envía el correo electrónico
        mail($to, $subject, $message);
        
        // Puedes agregar cualquier lógica adicional que necesites después de enviar el correo
        
        // Redirige al usuario a una página de éxito o agradecimiento (opcional)
        go('gracias-por-su-mensaje');
    }
};
