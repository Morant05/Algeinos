<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Puesto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Throwable;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $empresas = Empresa::all();
            $empleados = Empleado::paginate(10);
            return view('empleados.index', compact('empresas', 'empleados'));
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
            return view('empleados.create', compact('empresas'));
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
        try {
            $datos = $request->validated();
            $password = $datos['password'];

            unset($datos['password']);
            unset($datos['confirmar-password']);

            if (Usuario::where('email', $datos['email'])->exists()) {
                return redirect()->back()->withInput()->with('error', 'El email ya existe en usuarios.');
            }

            DB::beginTransaction();

            $empleado = Empleado::create($datos);

            $usuario= Usuario::create([
                'nombre' => trim($empleado->nombre . ' ' . $empleado->apellido),
                'email' => $empleado->email,
                'password' => Hash::make($password),
            ]);
            $usuario->assignRole('Empleado');

            DB::commit();

            return redirect()->route('empleados.index')->with('success', 'Empleado y usuario creados correctamente.');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error al crear empleado y usuario');
            Log::error($ex);

            return redirect()->back()->withInput()->with('error', 'No se pudo crear el empleado.');
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
            return view('empleados.edit', compact('empleado', 'empresas'));
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
