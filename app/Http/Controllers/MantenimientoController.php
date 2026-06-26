<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use App\Models\tipo_mantenimiento;
use Illuminate\Http\Request;
use App\Http\Requests\MantenimientoRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Mantenimiento;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $maquinas=Maquina::all();

            $tipo_mantenimientos=tipo_mantenimiento::all();
            $mantenimientos = Mantenimiento::with('tmantenimiento', 'maquina')->porMaquina(request('maquina_id'))->porTipo(request('tipo_id'))->paginate(5);
            return view('mantenimientos.index', compact('mantenimientos', 'maquinas', 'tipo_mantenimientos'));
        }catch(\Throwable $th){
            Log::error("error al crear mantenimiento");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al listar mantenimientos');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    try{
            $maquinas=Maquina::all();
            $tmantenimientos=tipo_mantenimiento::all();
            return view('mantenimientos.create', compact('maquinas', 'tmantenimientos'));
        }catch(\Throwable $th){
            Log::error("error al mostrar mantenimiento");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al guardar el mantenimiento');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MantenimientoRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Mantenimiento::create($datos);
            DB::commit();
            return redirect()->route('mantenimientos.index')->with('success', 'mantenimiento creado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear mantenimiento:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear el mantenimiento. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        try{
            $maquinas=Maquina::all();
            $tmantenimientos=tipo_mantenimiento::all();
            return view('mantenimientos.edit', compact('mantenimiento', 'maquinas', 'tmantenimientos'));
        }catch(\Throwable $th){
            Log::error("error al mostrar la edicion de mantenimiento");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'ubo un error al editar');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MantenimientoRequest $request, Mantenimiento $mantenimiento)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $mantenimiento->update($datos);
            DB::commit();
            return redirect()->route('mantenimientos.index')->with('success', 'mantenimiento actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar mantenimiento:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar el mantenimiento. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        try {
            $mantenimiento->delete();
            return redirect()->route('mantenimientos.index')->with('success', 'mantenimiento eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al eliminar mantenimiento");
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar el mantenimiento. Inténtalo de nuevo');
        }
    }
}
