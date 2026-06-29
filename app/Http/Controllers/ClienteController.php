<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clientes = Cliente::with('empresa')->paginate(10);
            return view('clientes.index', compact('clientes'));
        } catch (Throwable $th) {
            Log::error('Error al listar los clientes');
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al listar los clientes. Inténtalo de nuevo');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $empresas = Empresa::all();
            return view('clientes.create', compact('empresas'));
        } catch (Throwable $th) {
            Log::error('Error al cargar el formulario de creación');
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al cargar el formulario de creación. Inténtalo de nuevo');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            Cliente::create($datos);
            DB::commit();
            return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error al crear el cliente');
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear el cliente. Inténtalo de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        try {
            $empresas = Empresa::all();
            return view('clientes.edit', compact('cliente', 'empresas'));
        } catch (Throwable $th) {
            Log::error('Error al mostrar el formulario de edición');
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al mostrar el formulario de edición. Inténtalo de nuevo');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        try {
            DB::beginTransaction();
            $datos = $request->validated();
            $cliente->update($datos);
            DB::commit();
            return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error al actualizar el cliente');
            Log::error($th);
            return redirect()->back()->withInput()->with('error', 'Hubo un error al actualizar el cliente. Inténtalo de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            DB::beginTransaction();
            $cliente->delete();
            DB::commit();
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error al eliminar el cliente');
            Log::error($th);
            return redirect()->back()->with('error', 'Hubo un error al eliminar el cliente. Inténtalo de nuevo');
        }
    }
}
