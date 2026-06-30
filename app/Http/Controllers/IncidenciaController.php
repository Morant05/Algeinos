<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidenciaRequest;
use App\Models\Incidencia;
use App\Models\Obra;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $usuarios = Usuario::all();
            $obras = Obra::all();
            $incidencias = Incidencia::paginate(10);

            return view('incidencias.index', compact(
                'usuarios',
                'obras',
                'incidencias'
            ));

        } catch (Throwable $th) {

            Log::error('Error al listar las incidencias');
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al listar las incidencias. Inténtalo de nuevo.'
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $usuarios = Usuario::all();
            $obras = Obra::all();

            return view('incidencias.create', compact(
                'usuarios',
                'obras'
            ));

        } catch (Throwable $th) {

            Log::error('Error al cargar el formulario de creación');
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
    public function store(IncidenciaRequest $request)
    {
        try {

            DB::beginTransaction();

            $datos = $request->validated();

            Incidencia::create($datos);

            DB::commit();

            return redirect()
                ->route('incidencias.index')
                ->with('success', 'Incidencia creada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error('Error al crear la incidencia');
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al crear la incidencia. Inténtalo de nuevo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencia $incidencia)
    {
        try {

            $usuarios = Usuario::all();
            $obras = Obra::all();

            return view('incidencias.edit', compact(
                'incidencia',
                'usuarios',
                'obras'
            ));

        } catch (Throwable $th) {

            Log::error('Error al mostrar el formulario de edición');
            Log::error($th);

            return redirect()->back()->withInput()->with(
                'error',
                'Hubo un error al mostrar el formulario de edición. Inténtalo de nuevo.'
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncidenciaRequest $request, Incidencia $incidencia)
    {
        try {

            DB::beginTransaction();

            $datos = $request->validated();

            $incidencia->update($datos);

            DB::commit();

            return redirect()
                ->route('incidencias.index')
                ->with('success', 'Incidencia actualizada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error('Error al actualizar la incidencia');
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al actualizar la incidencia. Inténtalo de nuevo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencia $incidencia)
    {
        try {

            DB::beginTransaction();

            $incidencia->delete();

            DB::commit();

            return redirect()
                ->route('incidencias.index')
                ->with('success', 'Incidencia eliminada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error('Error al eliminar la incidencia');
            Log::error($th);

            return redirect()
                ->back()
                ->with('error', 'Hubo un error al eliminar la incidencia. Inténtalo de nuevo.');
        }
    }
}