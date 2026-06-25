<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Http\Requests\IncidenciaRequest;
use App\Models\Usuario;
use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $incidencias = Incidencia::paginate(10);
        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $usuarios = Usuario:: all();
        $obras = Obra::all();
        return view('incidencias.create', compact('usuarios', 'obras'));
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(IncidenciaRequest $request)
    {
        //
        try{
            DB::beginTransaction();
            Incidencia::create($request->validated());
            DB::commit();

            return redirect()->route('incidencias.index')->with('success', trans('panel.mensajes_sesion.crear_ok'));

        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('Error al crear la incidencia');
            Log::error($ex);
            return redirect()->back()->withInput()->with('error', trans('panel.mensajes_sesion.crear_ko'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencia $incidencia)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencia $incidencia)
    {
        //
    $id = Hashids::decode($id)[0];

    $incidencia = Incidencia::findOrFail($id);

    $usuarios = Usuario::all();
    $obras = Obra::all();

    return view('incidencias.edit', compact('incidencia', 'usuarios', 'obras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
      $id = Hashids::decode($id)[0];

    try {

        DB::beginTransaction();

        Incidencia::findOrFail($id)->update($request->validated());

        DB::commit();

        return redirect()
            ->route('incidencias.index')
            ->with('success', trans('panel.mensajes_sesion.editar_ok'));

    } catch (\Exception $ex) {

        DB::rollBack();

        Log::error('Error al actualizar la incidencia');
        Log::error($ex);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', trans('panel.mensajes_sesion.editar_ko'));
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $id = Hashids::decode($id)[0];

    try {
        DB::beginTransaction();

        Incidencia::findOrFail($id)->delete();

        DB::commit();

        return redirect()
            ->route('incidencias.index')
            ->with('success', trans('panel.mensajes_sesion.borrar_ok'));

    } catch (\Exception $ex) {

        DB::rollBack();

        Log::error('Error al eliminar la incidencia');
        Log::error($ex);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', trans('panel.mensajes_sesion.borrar_ko'));
    }
}
}