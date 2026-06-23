<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermisosRequest;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permisos = Permission::query();

        if ($request->busqueda) {
            $permisos = $permisos->where('name', 'like', '%' . $request->busqueda . '%')
                ->orWhere('descripcion', 'like', '%' . $request->busqueda . '%');
        }

        if ($request->grupo) {
            $permisos = $permisos->where('grupo', $request->grupo);
        }

        $permisos = $permisos->orderBy('grupo')->orderBy('created_at', 'DESC')->paginate();

        $grupos = Permission::groupBy('grupo')->get('grupo')->pluck('grupo', 'grupo');

        return view('permisos.index', [
            'permisos' => $permisos,
            'grupos' => $grupos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermisosRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(PermisosRequest $request)
    {
        try {
            DB::beginTransaction();

            Permission::create($request->validated());

            DB::commit();

            return redirect()->route('permisos.index')->with('success', trans('panel.mensajes_sesion.crear_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear el permiso');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.crear_ko'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Hashids::decode($id)[0];

        $permiso = Permission::findOrFail($id);

        return view('permisos.edit', [
            'permiso' => $permiso,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermisosRequest $request, $id)
    {
        $id = Hashids::decode($id)[0];

        try {
            DB::beginTransaction();

            Permission::findOrFail($id)->update($request->validated());

            DB::commit();

            return redirect()->route('permisos.index')->with('success', trans('panel.mensajes_sesion.editar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear el permiso');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.editar_ko'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Hashids::decode($id)[0];

        try {
            DB::beginTransaction();

            Permission::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('permisos.index')->with('success', trans('panel.mensajes_sesion.borrar_ok'));
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear el permiso');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.borrar_ko'));
        }
    }
}
