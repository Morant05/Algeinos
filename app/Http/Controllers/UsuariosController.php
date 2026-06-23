<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use App\Models\Usuario;
use Spatie\Permission\Models\Role;
use App\Http\Requests\{UsuariosRequest, CambioPasswordRequest};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    /**
     * Permisos
     */
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario')->only('index');
        $this->middleware('permission:crear-usuario')->only('create', 'store');
        $this->middleware('permission:editar-usuario')->only('edit', 'update');
        $this->middleware('permission:borrar-usuario')->only('destroy');
        $this->middleware('permission:cambio-password')->only('changepassword');
    }
    /**
     * Mostrar una lista del recurso
     *
     * @return \Illuminate\View\View
     * @param Request $request
     */
    public function index(Request $request)
    {
        $usuarios = Usuario::busqueda($request->busqueda);

        $usuarios = $usuarios->orderBy('created_at', 'ASC')->paginate();

        return view('usuarios.index', [
            'usuarios' => $usuarios,
        ]);
    }
    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //Obtenemos los roles
        $roles = Role::pluck('name', 'name')->except('socio')->all();
        return view('usuarios.create', ['roles' => $roles]);
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     *
     * @param UsuariosRequest $request
     * @return RedirectResponse
     */
    public function store(UsuariosRequest $request)
    {

        try {
            DB::beginTransaction();
            //Creamos nuevo usuario

            $usuario = Usuario::create([
                'nombre' => $request->validated()['nombre'],
                'email' => $request->validated()['email'],
                'password' => Hash::make($request->validated()['password']),
            ]);

            $usuario->assignRole($request->validated()['rol']);

            DB::commit();

            return redirect()->route('usuarios.index')->with('success', trans('panel.mensajes_sesion.crear_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear usuario');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.crear_ko'));
        }
    }


    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];
        //Buscamos usuario y obtenermos datos
        $usuario = Usuario::findOrFail($id);
        $roles = Role::pluck('name', 'name')->except('socio')->all();
        $rolusuario = $usuario->roles->pluck('name', 'name')->all();

        return view('usuarios.edit', [
            'usuario' => $usuario,
            'roles' => $roles,
            'rolusuario' => $rolusuario
        ]);
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param UsuariosRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UsuariosRequest $request, $id)
    {
        $id = Hashids::decode($id)[0];

        try {
            DB::beginTransaction();
            //Buscamos usuario y actualizamos
            $usuario = Usuario::findOrFail($id)->update($request->validated());

            DB::commit();

            return redirect()->route('usuarios.index')->with('success', trans('panel.mensajes_sesion.editar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al actualizar usuario');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.editar_ko'));
        }
    }

    /**
     *Elimina el recurso especificado del almacenamiento.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];

        try {
            DB::beginTransaction();
            //Buscamos usuario y eliminamos
            Usuario::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('usuarios.index')->with('success', trans('panel.mensajes_sesion.borrar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al eliminar usuario');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.borrar_ko'));
        }
    }

    /**
     * Actualice el recurso especificado en el almacenamiento.
     *
     * @param CambioPasswordRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function updatepassword(CambioPasswordRequest $request, $id)
    {
        $id = Hashids::decode($id)[0];
        try {

            DB::beginTransaction();
            //Buscamos usuario y actualizamos
            Usuario::findOrFail($id)->update([
                'password' => $request->validated()['password'],
            ]);

            DB::commit();

            return redirect()->route('home')->with('success', trans('panel.mensajes_sesion.editar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al actualizar password');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.editar_ko'));
        }
    }
}
