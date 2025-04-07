<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario\StoreUsuarioRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
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
        $roles = Role::pluck('name', 'name')->all();

        return view('usuarios.create', compact('roles'));
    }

    public function store(StoreUsuarioRequest $request)
    {
        $usuario = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $usuario->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')->with('success', 'Usuario Creado exitosamente.');
    }

    public function edit(User $usuario)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $usuario->roles->pluck('name', 'name')->all();
        return view('usuarios.edit', compact('usuario', 'roles', 'userRole'));
    }

    public function update(Request $request, User $usuario)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|max:191|unique:users,username,' . $usuario->id,
            'email' => 'nullable|email|unique:users,email,' . $usuario->id,
            //'roles' => 'required',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $usuario->update($input);
        DB::table('model_has_roles')->where('model_id', $usuario->id)->delete();

        $usuario->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado con éxito');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente');
    }
}
