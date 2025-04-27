<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Retornar la vista de autenticación.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $campo = filter_var($request->usuario, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$campo => $request->usuario, 'password' => $request->password])) {
            return redirect()->intended('/inicio');
        }

        return back()->withErrors(['error' => 'Credenciales inválidas']);
    }

    /**
     * Cerrar la sesión del usuario de la aplicación.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
