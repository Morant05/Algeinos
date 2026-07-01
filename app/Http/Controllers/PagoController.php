<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use App\Models\Renta;
use App\Http\Requests\PagoRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $rentas=Renta::all();
            $pagos = Pago::with('renta')->porRenta(request('renta_id'))->porReferencia(request('referencia'))->paginate(5);
            return view('pagos.index', compact('pagos', 'rentas'));
        }catch(\Throwable $th){
            Log::error("error al crear un pago");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al listar los pagos');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    try{
            $rentas=Renta::all();
            return view('pagos.create', compact('rentas'));
        }catch(\Throwable $th){
            Log::error("error al mostrar pago");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'hubo un error al guardar el pago');
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
            Pago::create($datos);
            DB::commit();
            return redirect()->route('pagos.index')->with('success', 'pago creado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al crear pago:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear el pago. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        try{
            $rentas=Renta::all();
            return view('pagos.edit', compact('pago', 'rentas'));
        }catch(\Throwable $th){
            Log::error("error al mostrar la edicion de pago");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al editar el pago');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagoRequest $request, Pago $pago)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $pago->update($datos);
            DB::commit();
            return redirect()->route('pagos.index')->with('success', 'pago actualizado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error("Error al actualizar pago:");
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar el pago. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        try {
            $pago->delete();
            return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente');
        } catch (\Throwable $th) {
            Log::error("Error al eliminar pago:");
            Log::error($th);

            return redirect()->back()->withInput()->with('error', 'Hubo un error al eliminar el pago. Inténtalo de nuevo');

        }
    }
}
