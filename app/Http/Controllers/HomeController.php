<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Repartidores, Usuario, Balizas, Pedidos, Expediciones};
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $contador_usuarios = Usuario::count();

        $contador_roles = Role::count();


        return view('home', [

            'contador_usuarios' => $contador_usuarios,
            'contador_roles' => $contador_roles,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function socket()
    {
        return view('socket.prueba');
    }
}
