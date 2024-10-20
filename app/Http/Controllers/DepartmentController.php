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
        $departments = Department::all()->sortBy('name');
        return view('admin.$departments.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Department $department)
    {
        $department = Department::find($department);

        if (!$department) {
            return back();
        }

        $departments = Department::all()->sortBy('nome');

        return view('admin.employees.edit', compact('employee', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
