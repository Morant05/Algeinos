<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Maquina;
use App\Models\Obra;
use App\Models\Empleado;
use App\Http\Requests\AsignacionRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $maquinas=Maquina::all();
            $obras=Obra::all();
            $empleados=Empleado::all();
            $asignaciones = Asignacion::with('maquina', 'obra', 'empleado')->porMaquina(request('maquina_id'))->porObra(request('obra_id'))->paginate(5);
            return view('asignaciones.index', compact('asignaciones', 'maquinas', 'obras', 'empleados'));
        }catch(\Throwable $th){
            Log::error("error al crear asignacion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al listar asignaciones');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    try{
            $maquinas=Maquina::all();
            $obras=Obra::all();
            $empleados=Empleado::all();
            return view('asignaciones.create', compact('maquinas', 'obras', 'empleados'));
        }catch(\Throwable $th){
            Log::error("error al mostrar asignacion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al guardar la asignacion');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignacionRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Asignacion::create($datos);
            DB::commit();
            return redirect()->route('asignaciones.index')->with('success', 'asignacion creada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear asignacion:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la asignacion. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignacion $asignacion)
    {
        try{
            $maquinas=Maquina::all();
            $obras=Obra::all();
            $empleados=Empleado::all();
            return view('asignaciones.edit', compact('asignacion', 'maquinas', 'obras', 'empleados'));
        }catch(\Throwable $th){
            Log::error("error al mostrar la edicion de asignacion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'ubo un error al editar');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignacionRequest $request, Asignacion $asignacion)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $asignacion->update($datos);
            DB::commit();
            return redirect()->route('asignaciones.index')->with('success', 'asignacion actualizada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar asignacion:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar la asignacion. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignacion $asignacion)
    {
        try {
            $asignacion->delete();
            return redirect()->route('asignaciones.index')->with('success', 'asignacion eliminada correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al eliminar asignacion");
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar la asignacion. Inténtalo de nuevo');
        }
    }
}
