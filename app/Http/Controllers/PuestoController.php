<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuestoRequest;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
         $puestos = Puesto::paginate(10);
            return view('puestos.index', compact('puestos'));
        }catch(Throwable $th){
            Log::error("Error al listar los puestos");
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al listar los puestos. Intentalo de nuevo');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('puestos.create');
        } catch (Throwable $th) {
            Log::error("Error al cargar el formulario de creación");
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al cargar el formulario de creacion. Intentalo de nuevo');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PuestoRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Puesto::create($datos);
            DB::commit();
            return redirect()->route('puestos.index')->with('success', 'Puesto creado exitosamente.');
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear el puesto");
            Log::error($th);
            return redirect()->back()->with('error', 'Error al crear el puesto');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puesto $puesto)
    {
        try {
            return view('puestos.edit', compact('puesto'));
        } catch (Throwable $th) {
            Log::error("Error al mostra el formulario de edicion");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edicuion. Intentalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PuestoRequest $request, Puesto $puesto)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $puesto->update($datos);
            DB::commit();
            return redirect()->route('puestos.index')->with('success', 'Puesto actualizado correctamente');
        } catch (Throwable $th) {
            Log::error("Error al actrualizar el puesto");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar el puesto. Intentalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puesto)
    {
        try {
            DB::beginTransaction();
            $puesto->delete();
            DB::commit();
            return redirect()->route('puestos.index')->with('seccess', 'Puesto eliminado correctamente');
        } catch (Throwable $th) {
            Log::error('Error al eliminar el puesto');
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar el puesto.Intentalo de nuevo');
        }
    }
}
