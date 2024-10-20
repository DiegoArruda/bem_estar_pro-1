<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departments = Department::where('name', 'like', '%' . $request->busca . '%')->orderBy('name', 'asc')->paginate(10);

        $totalDepartments = Department::all()->count();

        // Receber os dados do banco através
        return view('admin.departments.index', compact('departments', 'totalDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->toArray();

        Department::create($input);

        return redirect()->route('departments.index')->with('sucesso', 'Departamento cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $department = Department::find($id);

        if (!$department) {
            return back();
        }

        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //buscando questão
        $department = Department::find($id);

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Atualizar a questão
        $department->update([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('success', 'Departamento atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
