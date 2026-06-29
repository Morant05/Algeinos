<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $puestos=Puesto::all();
            $empresas = Empresa::all();
            $empleados = Empleado::paginate(10);
            return view('empleados.index', compact('empresas', 'empleados', 'puestos'));
        }catch(Throwable $th){
            Log::error("Error al listar los empleados");
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al listar los empleados. Intentalo de nuevo');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            $empresas= Empresa::all();
            $puestos=Puesto::all();
            return view('empleados.create', compact('empresas', 'puestos'));
        }catch(Throwable $th){
        Log::error("Error al cargar el formulario de creación");
        Log::error($th);
        return redirect()->back()->with('error','Hubo un error al cargar el formulario de creacion. Intentalo de nuevo');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoRequest $request)
    {
        try{
            DB::beginTransaction();
            $datos=$request->validated();
            Empleado::create($datos);
            DB::commit();
            return redirect()->route('empleados.index')->with('success', 'Empleado correctamente');
        }catch(Throwable $th){
            Log::error("Error al crear el empleado");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear el empleado. Intentalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        try {
            $empresas = Empresa::all();
            $puestos = Puesto::all();
            return view('empleados.edit', compact('empleado', 'empresas', 'puestos'));
        } catch (Throwable $th) {
            Log::error("Error al mostra el formulario de edicion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edicuion. Intentalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoRequest $request, Empleado $empleado)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $empleado->update($datos);
            DB::commit();
            return redirect()->route('empleados.index')->with('success', 'Empleado actualizada correctamente');
        } catch (Throwable $th) {
            Log::error("Error al actrualizar el empleado");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar el empleado. Intentalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        try {
            DB::beginTransaction();
            $empleado->delete();
            DB::commit();
            return redirect()->route('empleados.index')->with('seccess', 'Empleado eliminada correctamente');
        } catch (Throwable $th) {
            Log::error('Error al eliminar el empleado');
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar el empleado.Intentalo de nuevo');
        }
    }
}
