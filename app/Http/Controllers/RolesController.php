<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Vinkla\Hashids\Facades\Hashids;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $roles = Role::query();

        if ($request->busqueda) {
            $roles = $roles->where('name', 'like', '%' . $request->busqueda . '%')
                ->orWhere('descripcion', 'like', '%' . $request->busqueda . '%');
        }

        $roles = $roles->orderBy('created_at', 'ASC')->paginate();

        return view('roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RolesRequest $request
     * @return RedirectResponse
     */
    public function store(RolesRequest $request)
    {
        try {
            DB::beginTransaction();

            Role::create($request->validated());

            DB::commit();

            return redirect()->route('roles.index')->with('success', trans('panel.mensajes_sesion.crear_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear el rol');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.crear_ko'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];

        $rol = Role::findOrFail($id);

        return view('roles.edit', [
            'rol' => $rol,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RolesRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(RolesRequest $request, $id)
    {
        $id = Hashids::decode($id)[0];

        try {
            DB::beginTransaction();

            Role::findOrFail($id)->update($request->validated());

            DB::commit();

            return redirect()->route('roles.index')->with('success', trans('panel.mensajes_sesion.editar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear el rol');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.editar_ko'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];

        try {
            DB::beginTransaction();

            Role::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('roles.index')->with('success', trans('panel.mensajes_sesion.borrar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear el permiso');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.borrar_ko'));
        }
    }

    public function permisos($id)
    {
        $id = \Hashids::decode($id)[0];

        $rol = Role::with('permissions')->find($id);
        $permisos = Permission::all();
        $grupos = $permisos->groupBy('grupo');
        $permisos_rol = $rol->permissions->pluck('id')->toArray();

        return view('roles.permisos', compact('rol', 'grupos', 'permisos_rol'));
    }

    public function permisosUpdate(Request $request, $id)
    {
        $id = \Hashids::decode($id)[0];

        try {
            DB::beginTransaction();

            $rol = Role::with('permissions')->find($id);
            $rol->syncPermissions(Permission::find($request->permisos));

            DB::commit();

            return redirect()->route('roles.index')->with('success', trans('panel.mensajes_sesion.editar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al cambiar los permisos');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.editar_ko'));
        }
    }
}
