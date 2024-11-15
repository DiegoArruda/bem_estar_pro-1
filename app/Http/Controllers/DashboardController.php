<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        // Consulta para calcular a média dos pesos de cada funcionário
        $employees = DB::table('employees')
            ->leftJoin('tests', 'employees.id', '=', 'tests.employee_id')
            ->leftJoin('test_questions', 'tests.id', '=', 'test_questions.test_id')
            ->leftJoin('options', 'test_questions.option_id', '=', 'options.id')
            ->select('employees.id', 'employees.name', DB::raw('AVG(options.weight) as averageScore'))
            ->where(function ($query) {
                $query->whereNull('tests.id')
                      ->orWhere('tests.id', function ($subQuery) {
                          $subQuery->select('id')
                                   ->from('tests')
                                   ->whereColumn('employee_id', 'employees.id')
                                   ->orderByDesc('created_at')
                                   ->limit(1);
                      });
            })
            ->groupBy('employees.id', 'employees.name')
            ->get();

        // Contagem total de funcionários
        $totalEmployees = $employees->count();

        // Passar $employees e $totalEmployees para a view
        return view('admin.dashboard.index', compact('employees', 'totalEmployees'));
    }
}

