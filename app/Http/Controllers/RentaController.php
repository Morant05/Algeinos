<?php

namespace App\Http\Controllers;

use App\Models\Renta;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Http\Requests\RentaRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Mantenimiento;

class RentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $empresas=Empresa::all();
            $usuarios=Usuario::all();
            $rentas = Renta::with('empresa', 'usuarios')->porEmpresa(request('empresa_id'))->porUsuario(request('usuario_id'))->paginate(5);
            return view('rentas.index', compact('rentas', 'empresas', 'usuarios'));
        }catch(\Throwable $th){
            Log::error("error al crear una renta");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al listar las rentas');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    try{
            $empresas=Empresa::all();
            $usuarios=Usuario::all();
            return view('rentas.create', compact('empresas', 'usuarios'));
        }catch(\Throwable $th){
            Log::error("error al mostrar renta");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al guardar la renta');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Renta::create($datos);
            DB::commit();
            return redirect()->route('rentas.index')->with('success', 'renta creada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear renta:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la renta. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Renta $renta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Renta $renta)
    {
        try{
            $empresas=Empresa::all();
            $usuarios=Usuario::all();
            return view('rentas.edit', compact('renta', 'empresas', 'usuarios'));
        }catch(\Throwable $th){
            Log::error("error al mostrar la edicion de renta");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'ubo un error al editar');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RentaRequest $request, Renta $renta)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $renta->update($datos);
            DB::commit();
            return redirect()->route('rentas.index')->with('success', 'renta actualizada correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar renta:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar la renta. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renta $renta)
    {
        try {
            $renta= Renta::findOrFail($id);
            $renta->delete();
            return redirect()->route('rentas.index')->with('success', 'Renta eliminada correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al eliminar renta:");
            Log::error($th);

            return redirect()->back()->withInput()->with('error', 'Hubo un error al eliminar la renta. Inténtalo de nuevo');

        }
    }
    }
