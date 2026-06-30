<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvidenciaRequest;
use App\Models\Evidencia;
use App\Models\Empresa;
use App\Models\Empleado;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $empresas = Empresa::all();
            $empleados = Empleado::all();
            $incidencias = Incidencia::all();
            $evidencias = Evidencia::paginate(10);

            return view('evidencias.index', compact(
                'empresas',
                'empleados',
                'incidencias',
                'evidencias'
            ));
        } catch (Throwable $th) {
            Log::error("Error al listar las evidencias");
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al listar las evidencias. Inténtalo de nuevo.'
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $empresas = Empresa::all();
            $empleados = Empleado::all();
            $incidencias = Incidencia::all();

            return view('evidencias.create', compact(
                'empresas',
                'empleados',
                'incidencias'
            ));

        } catch (Throwable $th) {

            Log::error("Error al cargar el formulario de creación");
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
    public function store(EvidenciaRequest $request)
    {
        try {

            DB::beginTransaction();

            $datos = $request->validated();

            Evidencia::create($datos);

            DB::commit();

            return redirect()
                ->route('evidencias.index')
                ->with('success', 'Evidencia creada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al crear la evidencia");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al crear la evidencia. Inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Evidencia $evidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evidencia $evidencia)
    {
        try {

            $empresas = Empresa::all();
            $empleados = Empleado::all();
            $incidencias = Incidencia::all();

            return view('evidencias.edit', compact(
                'evidencia',
                'empresas',
                'empleados',
                'incidencias'
            ));

        } catch (Throwable $th) {

            Log::error("Error al mostrar el formulario de edición");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al mostrar el formulario de edición. Inténtalo de nuevo.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EvidenciaRequest $request, Evidencia $evidencia)
    {
        try {

            DB::beginTransaction();

            $datos = $request->validated();

            $evidencia->update($datos);

            DB::commit();

            return redirect()
                ->route('evidencias.index')
                ->with('success', 'Evidencia actualizada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al actualizar la evidencia");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al actualizar la evidencia. Inténtalo de nuevo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evidencia $evidencia)
    {
        try {

            DB::beginTransaction();

            $evidencia->delete();

            DB::commit();

            return redirect()
                ->route('evidencias.index')
                ->with('success', 'Evidencia eliminada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al eliminar la evidencia");
            Log::error($th);

            return redirect()
                ->back()
                ->with('error', 'Hubo un error al eliminar la evidencia. Inténtalo de nuevo.');
        }
    }
}