<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()) {
            return redirect()->route('admin.surveys.index');
        }
        return view('admin.login');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.surveys.index')
                ->withSuccess('Inicio de sesión exitoso.');
        }

        return redirect()->route('admin.login')->withErrors([
            'session' => 'Valida que los datos ingresados sean los correctos.',
        ]);
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
