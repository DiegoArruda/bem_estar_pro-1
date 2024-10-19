<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $objDepartment;

    public function __construct()
    {
        $this->objDepartment = new Department();
    }

    public function index(Request $request)
    {
        // Receber os dados do banco através


        $departments = Department::where('name', 'like','%'.$request->busca.'%')->orderBy('name','asc')->paginate(10);

        $totalDepartments = Department::all()->count();

        return view('admin.departments.index',compact('departments', 'totalDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=$this->objDepartment->all();
        return view('admin.departments.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->save();

        return redirect()->route('admin.departments.index')->with('success', 'Departamento criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $department = $this->objDepartment->find($id);

    if (!$department) {
        return redirect()->back()->with('error', 'Department not found');
    }

    return view('admin.departments.show', compact('department'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {  //Arrumar aqui
        $department=$this->objDepartment->find($id);
        return view('admin.departments.create', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $input = $request->toArray();

        $department = Department::find($id);

        $department->fill($input);
        $department->save();
        return redirect()->route('departments.index')->with('sucesso','Departamento alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $department = Department::find($id);

        // Apagando o registro no banco de dados
        $department->delete();

        return redirect()->route('departments.index')->with('sucesso','Departamento exluído com sucesso.');
    }
}
