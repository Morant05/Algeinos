<?php

namespace App\Http\Controllers;

use App\Http\Requests\SucursalRequest;
use App\Models\Empresa;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas=Empresa::all();
        $sucursales=Sucursal::paginate(10);
        return view('sucursales.index', compact('sucursales', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas= Empresa::all();
        return view('sucursales.create', compact('empresas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SucursalRequest $request)
    {
        try{
            DB::beginTransaction();
             $datos=$request->validated();
             Sucursal::create($datos);
             DB::commit();
             return redirect()-> route('sucursales.index')->with('success', 'Sucursal creada correctamente');
        }catch(Throwable $th){
            Log::error("Error al crear la sucursal");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la sucursal. intentalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sucursal $sucursal)
    {
        try{
            $empresas= Empresa::all();
            return view('sucursales.edit', compact('sucursal', 'empresas'));
        } catch (Throwable $th) {
            Log::error("Error al mostra el formulario de edicion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edicuion. Intentalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SucursalRequest $request, Sucursal $sucursal)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Sucursal::update($datos);
            DB::commit();
            return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada correctamente');
        } catch (Throwable $th) {
            Log::error("Error al actrualizar la sucursal");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar la sucursal. Intentalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursal $sucursal)
    {
        try {
            DB::beginTransaction();
            $sucursal->delete();
            DB::commit();
            return redirect()->route('sucursales.index')->with('seccess', 'Sucursal eliminada correctamente');
        } catch (Throwable $th) {
            Log::error('Error al eliminar la Sucursal');
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar la sucursal.Intentalo de nuevo');
        }
    }
}
