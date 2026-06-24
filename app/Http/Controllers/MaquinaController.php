<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use App\Models\Categoria;
use App\Http\Requests\MaquinaRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorias = Categoria::all();
            $maquinas = Maquina::PorNombre(request('nombre'))->PorCategoria(request('categoria_id'))->paginate(5);
            return view('maquinas.index', compact('maquinas', 'categorias'));
        } catch (\Throwable $th) {
            Log::error("Error al listar categorias");
            Log::error($th);
            return redirect()->back()->withInput()->with('error','Hubo un error al listar las categorias. Inténtalo de nuevo');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
             $categorias = Categoria::all();
            return view('maquinas.create', compact('categorias'));
        } catch (\Throwable $th) {
            Log::error("Error al mostrar el formulario de creación de maquinas:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de creación. Inténtalo de nuevo');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaquinaRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Maquina::create($datos);
            DB::commit();
            return redirect()->route('maquinas.index')->with('success', 'maquina creada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear una maquina:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la maquina. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Maquina $maquina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maquina $maquina)
    {
    try {
            $categorias = Categoria::all();
            return view('maquinas.edit', compact('maquina', 'categorias'));
        } catch (\Throwable $th) {
            Log::error("Error al mostrar el formulario de edición de maquinas:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edición. Inténtalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaquinaRequest $request, Maquina $maquina)
    {
    try {
            DB::beginTransaction();
            $datos = $request->validated();
            $maquina->update($datos);
            DB::commit();
            return redirect()->route('maquinas.index')->with('success', 'maquina actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar maquina:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar la maquina. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maquina $maquina)
    {
    try {
            $maquina->delete();
            return redirect()->route('maquinas.index')->with('success', 'maquina eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al eliminar maquina:");
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar la maquina. Inténtalo de nuevo');
        }
    }
}
