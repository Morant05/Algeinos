<?php

namespace App\Http\Controllers;

use App\Models\obra;
use Illuminate\Http\Request;
use App\Http\Requests\ObraRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $obras = Obra::porNombre(request()->get('nombre'))->paginate(10);
            return view('obras.index', compact('obras'));
        } catch (\Throwable $th) {
            Log::error("Error al listar obras");
            Log::error($th);
            return redirect()->back()->withInput()->with('error','Hubo un error al listar las obras. Inténtalo de nuevo');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('obras.create');
        } catch (\Throwable $th) {
            Log::error("Error al mostrar el formulario de creación de obra:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de creación. Inténtalo de nuevo');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ObraRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Obra::create($datos);
            DB::commit();
            return redirect()->route('obras.index')->with('success', 'Obra creada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear obra:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la obra. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(obra $obra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(obra $obra)
    {
        try {
            $obras = Obra::all();
            return view('obras.edit', compact('obra'));
        } catch (\Throwable $th) {
            Log::error("Error al mostrar el formulario de edición de obra:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edición. Inténtalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ObraRequest $request, obra $obra)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $obra->update($datos);
            DB::commit();
            return redirect()->route('obras.index')->with('success', 'Obra actualizada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar obra:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar la obra. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(obra $obra)
    {
        try {
            DB::beginTransaction();
            Asignacion::where('obra_id', $obra->id)->delete();
            $obra->delete();
            DB::commit();
            return redirect()->route('obras.index')->with('success', 'Obra eliminada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al eliminar obra:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al eliminar la obra. Inténtalo de nuevo');

        }
    }
}
