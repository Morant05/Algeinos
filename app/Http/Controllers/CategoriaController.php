<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categorias = categoria::porNombre(request()->get('nombre'))->paginate(5);
            return view('categorias.index', compact('categorias'));
        }catch (\Throwable $th){
            Log::error("Error al listar categorias");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al listar las categorias');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            return view('categorias.create');
        }catch(\Throwable $th){
            Log::error("Error al mostrar el formulario de categorias:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al mostrar de creacion. intentelo mas tarde:');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Categoria::create($datos);
            DB::commit();
            return redirect()->route('categorias.index')->with('succes', 'categoria creada correctamente');
        }catch (\Throwable $th){
            DB::rollBack();
            Log::error("Error al crear categoria:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la categoria');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        try{
            return view('categorias.edit', compact('categoria'));
        }catch (\Throwable $th){
            Log::error("Error al mostrar el formulario de edicion:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al mostrar el formulario de edicion. intentelo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        try{
            DB::beginTransaction();
            $datos=$request->validated();
            $categoria->update($datos);
            DB::commit();
            return redirect()->route('categorias.index')->with('success', 'Autor actualizado con exito');
        }catch (\Throwable $th){
            DB::rollBack();
            Log::error("Error al actualizar categoria:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al actualizar la categoria');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try{
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'autor eliminado con exito');
        }catch (\Throwable $th){
            Log::error("error al eliminar categoria:");
            Log::error($th);
            return redirect()->back()->with('error','hubo un error al eliminar la categoria');
        }
    }
}
