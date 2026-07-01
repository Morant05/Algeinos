<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Http\Requests\BitacoraRequest;
use App\Models\Empleado;
use App\Models\Obra;


class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         try {

            $empleados = Empleado::all();
            $obras = Obra::all();
            $bitacoras = Bitacora::paginate(10);

            return view('bitacoras.index', compact(
                'empleados',
                'obras',
                'bitacoras'
            ));

        } catch (Throwable $th) {

            Log::error("Error al listar las bitácoras");
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al listar las bitácoras.'
            );
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            $empleados = Empleado::all();
            $obras = Obra::all();

            return view('bitacoras.create', compact(
                'empleados',
                'obras'
            ));

        } catch (Throwable $th) {

            Log::error("Error al mostrar el formulario de creación de bitácora");
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al mostrar el formulario de creación de bitácora.'
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BitacoraRequest $request)
    {
        //
        try {
            $datos = $request->validated();

            Bitacora::create($datos);

            return redirect()->route('bitacoras.index')->with(
                'success',
                'Bitácora creada exitosamente.'
            );

        } catch (Throwable $th) {

            Log::error("Error al crear la bitácora");
            Log::error($th);

            return redirect()->back()->with(
                'error',
                'Hubo un error al crear la bitácora. Inténtalo de nuevo.'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bitacora $bitacora)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacora $bitacora)
    {
        //    
         try {

            $empleados = Empleado::all();
            $obras = Obra::all();

            return view('bitacoras.edit', compact(
                'bitacora',
                'empleados',
                'obras'
            ));

        } catch (Throwable $th) {

            Log::error("Error al mostrar el formulario de edición");
            Log::error($th);

            return redirect()
                ->back()
                ->with('error', 'Hubo un error al cargar la edición.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BitacoraRequest $request, Bitacora $bitacora)
    {
        //
        try {

            DB::beginTransaction();

            $datos = $request->validated();

            $bitacora->update($datos);

            DB::commit();

            return redirect()
                ->route('bitacoras.index')
                ->with('success', 'Bitácora actualizada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al actualizar la bitácora");
            Log::error($th);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Hubo un error al actualizar la bitácora.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bitacora $bitacora)
    {
        //
         try {

            DB::beginTransaction();

            $bitacora->delete();

            DB::commit();

            return redirect()
                ->route('bitacoras.index')
                ->with('success', 'Bitácora eliminada correctamente');

        } catch (Throwable $th) {

            DB::rollBack();

            Log::error("Error al eliminar la bitácora");
            Log::error($th);

            return redirect()
                ->back()
                ->with('error', 'Hubo un error al eliminar la bitácora.');
        }
    }
}