<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::paginate(10); 
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Empresa::create($datos);
            DB::commit();
            return redirect()->route('empresas.index')->with('success', 'Empresa creada exitosamente.');
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear la empresa");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al crear la empresa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        try{
            return view('empresas.edit', compact('empresa'));
        }catch(Throwable $th){
            Log::error("Error al mostra el formulario de edicion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edicuion. Intentalo de nuevo');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
