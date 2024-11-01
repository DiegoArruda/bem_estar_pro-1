<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class LoginEmployeeController extends Controller
{
    public function index()
    {
        return view('home.login.index');
    }

    public function auth(Request $request)
    {
        $employee = Employee::where('cpf', $request->cpf)->first();

        session()->put('name', $employee->name);
        session()->put('id', $employee->id);

        // Receber os dados do banco através
        return redirect()->route('home.tests.index');
    }

    public function logout(Request $request)
    {

    }
}
