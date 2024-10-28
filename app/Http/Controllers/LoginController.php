<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.login.index');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],
        [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'O e-mail informado não é válido',
            'password.required' => 'O campo senha é obrigatório'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('employees.index');
        }else{
            return redirect()->back()->with('error','E-mail ou senha inválida');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.index');
    }
}
