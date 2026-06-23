<?php

return [
    'sidebar' => [
        'usuarios' => 'Usuarios',
        'config' => 'Configuración',
        'vars' => 'Variables de entorno',
        'roles' => 'Roles',
        'permisos' => 'Permisos',
        'tablero' => 'Tablero',
        'config_email'=>'Configuracion Email'
    ],
    'listado' => [
        'usuarios' => [
            'index' => 'Listado de Usuarios',
            'create' => 'Crear Nuevo Usuario',
            'edit' => 'Editar Usuario',
        ],
        'permisos' => [
            'index' => 'Listado de Permisos',
            'create' => 'Crear Nuevo Permiso',
            'edit' => 'Editar Permiso',
        ],
        'roles' => [
            'index' => 'Listado de Roles',
            'create' => 'Crear Nuevo Rol',
            'edit' => 'Editar Rol',
            'permisos' => 'Editar los Permisos del Rol',
        ],
    ],
    'filtros' => [
        'busqueda' => 'Escribe un texto para buscar',
        'grupo' => 'Grupo',
    ],
    'acciones' => [
        'buscar' => 'Buscar',
        'crear' => 'Crear nuevo',
        'guardar' => 'Guardar',
        'mostrar'=> 'Mostrar',
        'ver' => 'Ver',
        'editar' => 'Editar',
        'editar_permisos' => 'Editar Permisos',
        'borrar' => 'Borrar',
        'aceptar' => 'Aceptar',
        'cancelar' => 'Cancelar',
        'recuperacion_modal_titulo' => 'Confirmar Recuperacion',
        'recuperacion_modal' => '¿Está seguro/a de que desea recuperar este registro?',
        'borrar_modal_titulo' => '¿Está seguro/a de que desea eliminar este registro?',
        'borrar_modal' => '¿Está seguro/a de que desea eliminar este registro?',
    ],
    'tablas' => [
        'password'=>'Password',
        'confirmarpassword'=>'Confirme password',
        'rol'=> 'Rol',
        'descripcion' => 'Descripción',
        'nombre' => 'Nombre',
        'apellidos' => 'Apellidos',
        'apellido_paterno' => 'Apellido Paterno',
        'apellido_materno' => 'Apellido Materno',
        'grupo' => 'Grupo',
        'guard_name' => 'Grupo Middleware',
        'acciones' => 'Acciones',
        'identificador' => 'Identificador',
        'direccion' => 'Direccion',
        'finalizada' => 'Finalizada',
        'fecha' => 'Fecha',
        'tipo' => 'Tipo',
        'realizado' => 'Realizado',
        'resultado'=>'Resultado',
        'listado'=>'Listado',
        'sin_resultados' => 'No se han encontrado resultados.',
        'email' => 'Correo Electrónico'
    ],
    'mensajes_sesion' => [
        'crear_ok' => 'Elemento creado correctamente',
        'crear_ko' => 'Ha ocurrido un error al crear el elemento',
        'editar_ok' => 'Elemento editado correctamente',
        'editar_ko' => 'Ha ocurrido un error al editar el elemento',
        'borrar_ok' => 'Elemento borrado correctamente',
        'borrar_ko' => 'Ha ocurrido un error al borrar el elemento',
    ]
];
