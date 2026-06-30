<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Obra;
use App\Models\Empleado;
use App\Http\Requests\ReporteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obras = Obra::all();
            $empleados = Empleado::all();
            $reportes = Reporte::paginate(10);

            return view('reportes.index', compact(
                'obras',
                'empleados',
                'reportes'
            ));

        } catch (Throwable $th) {

            Log::error("Error al listar los reportes");
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al listar los reportes. Inténtalo de nuevo.'
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $obras = Obra::all();
            $empleados = Empleado::all();

            return view('reportes.create', compact(
                'obras',
                'empleados'
            ));

        } catch (Throwable $th) {

            Log::error("Error al cargar el formulario de creación de reportes");
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al cargar el formulario de creación. Inténtalo de nuevo.'
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReporteRequest $request)
    {
        try {

            DB::beginTransaction();

            $datos = $request->validate([
                'obra_id' => 'required',
                'empleado_id' => 'required',
                'tipo' => 'required',
                'contenido' => 'required',
                'fecha' => 'required|date',
            ]);

            Reporte::create($datos);

            DB::commit();

            return redirect()
                ->route('reportes.index')
                ->with('success', 'Reporte creado correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al crear el reporte");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al crear el reporte. Inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        try {

            $obras = Obra::all();
            $empleados = Empleado::all();

            return view('reportes.edit', compact(
                'reporte',
                'obras',
                'empleados'
            ));

        } catch (Throwable $th) {

            Log::error("Error al mostrar el formulario de edición de reportes");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al mostrar el formulario de edición.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReporteRequest $request, Reporte $reporte)
    {
        try {

            DB::beginTransaction();

            $datos = $request->validate([
                'obra_id' => 'required',
                'empleado_id' => 'required',
                'tipo' => 'required',
                'contenido' => 'required',
                'fecha' => 'required|date',
            ]);

            $reporte->update($datos);

            DB::commit();

            return redirect()
                ->route('reportes.index')
                ->with('success', 'Reporte actualizado correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al actualizar el reporte");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al actualizar el reporte.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        try {

            DB::beginTransaction();

            $reporte->delete();

            DB::commit();

            return redirect()
                ->route('reportes.index')
                ->with('success', 'Reporte eliminado correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al eliminar el reporte");
            Log::error($th);

            return redirect()
                ->back()
                ->with('error', 'Hubo un error al eliminar el reporte.');
        }
    }
}