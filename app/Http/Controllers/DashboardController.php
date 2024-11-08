<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::query()->orderBy('name', 'asc')->get();

        $totalEmployees = Employee::all()->count();

        // Receber os dados do banco através
        return view('admin.dashboard.index', compact('employees', 'totalEmployees'));
    }
}
