<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = Employee::where('name', 'like', '%' . $request->busca . '%')->orderBy('name', 'asc')->paginate(10);

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

        return redirect()->route('employees.index')->with('success', 'Funcionário cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = Employee::find($id);

        $testsEmployee = DB::table('test_questions')
            ->join('tests', 'test_questions.test_id', '=', 'tests.id')
            ->join('employees', 'tests.employee_id', '=', 'employees.id')
            ->join('options', 'test_questions.option_id', '=', 'options.id')
            ->select('tests.id', 'tests.created_at', DB::raw('AVG(options.weight) as averageScore'))
            ->where('employees.id', $id)
            ->groupBy('tests.id', 'tests.created_at')
            ->orderBy('tests.created_at', 'asc')
            ->get();

        // Arrays para as labels (datas) e data (média)
        $datas = [];
        $medias = [];

        // Preenche os arrays
        foreach ($testsEmployee as $test) {
            $datas[] = Carbon::parse($test->created_at)->format('d/m/Y'); // Data formatada
            $medias[] = round($test->averageScore, 1); // Média de cada avaliação
        }

        return view('admin.employees.show', compact('employee', 'datas', 'medias', 'testsEmployee'));
    }

    public function test_details(int $id)
    {
        $test = DB::table('tests')
            ->join('employees', 'tests.employee_id', '=', 'employees.id')
            ->select('employees.name', 'tests.created_at', 'tests.comment')
            ->where('tests.id', $id)
            ->get();

        $questions = DB::table('tests')
            ->join('test_questions', 'test_questions.test_id', '=', 'tests.id')
            ->join('questions', 'test_questions.question_id', '=', 'questions.id')
            ->join('options', 'test_questions.option_id', '=', 'options.id')
            ->select('questions.description', 'options.weight')
            ->where('tests.id', $id)
            ->orderBy('questions.id', 'asc')
            ->get();

        $average = 0;
        $totalQuestions = 0;

        foreach ($questions as $question) {
            $average = $average + $question->weight;
            $totalQuestions++;
        }

        $average = round($average / $totalQuestions, 1);

        return view('admin.employees.test_details', compact('test', 'questions', 'average'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return back();
        }

        $departments = Department::all()->sortBy('nome');

        return view('admin.employees.edit', compact('employee', 'departments'));
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
        return redirect()->route('employees.index')->with('success', 'Funcionário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $employee = Employee::find($id);

        // Apagando o registro no banco de dados
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Funcionário exluído com sucesso.');
    }
}
