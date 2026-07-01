<?php

namespace App\Http\Controllers;

use App\Models\tipo_mantenimiento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Mantenimiento;
use App\Http\Requests\TmantenimientoRequest;
use Illuminate\Http\Request;

class TipoMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tipo_mantenimientos = Tipo_mantenimiento::porNombre(request()->get('nombre'))->paginate(10);
            return view('tmantenimientos.index', compact('tipo_mantenimientos'));
        } catch (\Throwable $th) {
            Log::error("Error al listar tipos de mantenimiento");
            Log::error($th);
            return redirect()->back()->withInput()->with('error','Hubo un error al listar los tipos de mantenimiento. Inténtalo de nuevo');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('tmantenimientos.create');
        } catch (\Throwable $th) {
            Log::error("Error al mostrar el formulario de creación de tipo de mantenimiento:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de creación. Inténtalo de nuevo');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TmantenimientoRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Tipo_mantenimiento::create($datos);
            DB::commit();
            return redirect()->route('tmantenimientos.index')->with('success', 'Tipo de mantenimiento creado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear tipo de mantenimiento:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear el tipo de mantenimiento. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tipo_mantenimiento $tipo_mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipo_mantenimiento $tipo_mantenimiento)
    {
    try {
            $tmantenimiento = $tipo_mantenimiento;
            return view('tmantenimientos.edit', compact('tmantenimiento'));
        } catch (\Throwable $th) {
            Log::error("Error al mostrar el formulario de edición de tipo de mantenimiento:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edición. Inténtalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TmantenimientoRequest $request, tipo_mantenimiento $tipo_mantenimiento)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $tipo_mantenimiento->update($datos);
            DB::commit();
            return redirect()->route('tmantenimientos.index')->with('success', 'Tipo de mantenimiento actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar tipo de mantenimiento:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar el tipo de mantenimiento. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(tipo_mantenimiento $tipo_mantenimiento)
{
    try {
        Mantenimiento::where('tipo_id', $tipo_mantenimiento->id)->delete();
        $tipo_mantenimiento->delete();
        return redirect()->route('tmantenimientos.index')->with('success', 'Tipo de mantenimiento eliminado correctamente');
    } catch (\Throwable $th) {
        Log::error("Error al eliminar tipo de mantenimiento:");
        Log::error($th);
        return redirect()->back()->withInput()->with('error', 'Hubo un error al eliminar el tipo de mantenimiento. Inténtalo de nuevo');
    }
}
}
