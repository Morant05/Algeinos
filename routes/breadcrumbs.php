<?php

/*
* Note: Laravel will automatically resolve `Breadcrumbs::` without
* this import. This is nice for IDE syntax and refactoring.
*/

use Diglactic\Breadcrumbs\Breadcrumbs;

/*
* This import is also not required, and you could replace `BreadcrumbTrail $trail`
* with `$trail`. This is nice for IDE type checking and completion.
*/
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/*
* Portada
*/
Breadcrumbs::for('portada', function (BreadcrumbTrail $trail) {
    $trail->push(trans('breadcrumbs.portada'), route('home'));
});


/*
* Usuarios
*/
Breadcrumbs::for('menu-usuarios', function (BreadcrumbTrail $trail) {
    $trail->parent('portada');
    $trail->push(trans('breadcrumbs.usuarios.menu'), route('usuarios.index'));
});
Breadcrumbs::for('crear-usuario', function (BreadcrumbTrail $trail) {
    $trail->parent('menu-usuarios');
    $trail->push(trans('breadcrumbs.usuarios.crear'), route('usuarios.create'));
});
Breadcrumbs::for('editar-usuario', function (BreadcrumbTrail $trail, $usuario) {
    $trail->parent('menu-usuarios');
    $trail->push(trans('breadcrumbs.usuarios.editar') . ' - ' . $usuario->nombre, route('usuarios.edit', $usuario->id));
});


/*
* Permisos
*/
Breadcrumbs::for('menu-permisos', function (BreadcrumbTrail $trail) {
    $trail->parent('portada');
    $trail->push(trans('breadcrumbs.permisos.menu'), route('permisos.index'));
});
Breadcrumbs::for('crear-permiso', function (BreadcrumbTrail $trail) {
    $trail->parent('menu-permisos');
    $trail->push(trans('breadcrumbs.permisos.crear'), route('permisos.create'));
});
Breadcrumbs::for('editar-permiso', function (BreadcrumbTrail $trail, $permiso) {
    $trail->parent('menu-permisos');
    $trail->push(trans('breadcrumbs.permisos.editar') . ' - ' . $permiso->descripcion, route('permisos.edit', $permiso->id));
});


/*
* Roles
*/
Breadcrumbs::for('menu-roles', function (BreadcrumbTrail $trail) {
    $trail->parent('portada');
    $trail->push(trans('breadcrumbs.roles.menu'), route('roles.index'));
});
Breadcrumbs::for('crear-rol', function (BreadcrumbTrail $trail) {
    $trail->parent('menu-roles');
    $trail->push(trans('breadcrumbs.roles.crear'), route('roles.create'));
});
Breadcrumbs::for('editar-rol', function (BreadcrumbTrail $trail, $permiso) {
    $trail->parent('menu-roles');
    $trail->push(trans('breadcrumbs.roles.editar') . ' - ' . $permiso->descripcion, route('roles.edit', $permiso->id));
});
Breadcrumbs::for('editar-rol-permisos', function (BreadcrumbTrail $trail, $rol) {
    $trail->parent('menu-roles');
    $trail->push(trans('breadcrumbs.roles.permisos') . ' - ' . $rol->descripcion, route('roles.rol-permisos', $rol->id));
});
