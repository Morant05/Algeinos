<?php

return [
    'estados' => [
        '401' => 'No autorizado',
        '404' => 'No se encontró el recurso solicitado',
        '405'=>'Método no permitido',
        '406'=>'No aceptable',
        '409'=>'Conflicto',
        '422'=> 'Entidad no procesable',
        '500' => 'Hubo un error en el servidor y la solicitud no pudo ser completada'
    ],
    'errores' => [
        'autenticacion' => [
            'datos_incorrectos' => 'Los datos de acceso son incorrectos',
            'no_es_repartidor' => 'Los datos de acceso ingresados no son de un repartidor',
            'no_autorizado' => 'Usuario no autorizado',
            'salir_app' => 'Se ha genero un error al cerrar sesion'
        ],
        'recuperar_password' => [
            'no_existe_email' => 'El email ingresado no existe'
        ],
    ],
    'exito' => [
        'autenticacion' => [
            'ingreso_exitoso' => 'Ha ingresado exitosamente',
            'refresco_token' => 'Refresco de token exitoso',
            'salir_app' => 'Cerro sesion exitosamente'
        ],
        'recuperar_password' => [
            'cambio_password' => 'Se envio un email con enlace para recuperacion de tu password'
        ],
    ]
];
