<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Usuarios Listar|Usuarios Crear|Usuarios Editar|Usuarios Eliminar', ['only' => ['index', 'show']]);
        $this->middleware('permission:Usuarios Crear', ['only' => ['create', 'store']]);
        $this->middleware('permission:Usuarios Editar', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Usuarios Eliminar', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('usuarios.index');
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(StoreUsuarioRequest $request)
    {
        $usuario = User::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //$usuario->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')->with('success', 'Usuario Creado exitosamente.');
    }
}
