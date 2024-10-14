<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = Employee::where('name', 'like','%'.$request->busca.'%')->orderBy('name', 'asc')->paginate(10);

        $totalEmployees = Employee::all()->count();

        // Receber os dados do banco através
        return view('admin.employees.index', compact('employees', 'totalEmployees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna o formulário de cadastro do funcionário
        $departments = Department::all()->sortBy('name');
        return view('admin.employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();
        // dd($input);

        //Armazena o id do usuário do sistema logado no cadastro do funcionário
        $input['user_id'] = 1;
        // $input['user_id'] = auth()->user()->id;

        // Insert de dados do usuário no banco
        Employee::create($input);

        return redirect()->route('employees.index')->with('sucesso','Funcionário cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $employee = Employee::find($id);

        if(!$employee){
            return back();
        }

        $departments = Department::all()->sortBy('nome');

        return view('admin.employees.edit', compact('employee','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $input = $request->toArray();

        $employee = Employee::find($id);

        $employee->fill($input);
        $employee->save();
        return redirect()->route('employees.index')->with('sucesso','Funcionário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $employee = Employee::find($id);

        // Apagando o registro no banco de dados
        $employee->delete();

        return redirect()->route('employees.index')->with('sucesso','Funcionário exluído com sucesso.');
    }
}
