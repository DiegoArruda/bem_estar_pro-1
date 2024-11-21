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
        $userId = $id; // Substitua pelo ID do funcionário desejado

        $questionnaireDates = DB::table('test_questions')
            // Junta com a tabela 'tests' para pegar o 'test_id'
            ->join('tests', 'test_questions.test_id', '=', 'tests.id')
            // Junta com a tabela 'employees' para filtrar pelo 'employee_id'
            ->join('employees', 'tests.employee_id', '=', 'employees.id')
            // Junta com a tabela 'options' para calcular a média dos pesos das opções
            ->join('options', 'test_questions.option_id', '=', 'options.id')
            // Seleciona a data de criação do questionário e a média das opções
            ->select('tests.id', 'test_questions.created_at', DB::raw('AVG(options.weight) as averageScore'))
            // Filtra pelo 'employee_id' do funcionário
            ->where('employees.id', $id)
            // Agrupa por 'test_id' para calcular a média de cada questionário
            ->groupBy('test_questions.test_id', 'test_questions.created_at')
            // Ordena pelas datas de criação do questionário (do mais antigo para o mais recente)
            ->orderBy('test_questions.created_at', 'asc')
            ->get();

        // Arrays para as labels (datas) e data (média)
        $datas = [];
        $medias = [];
        $id_test = [];

        // Preenche os arrays
        foreach ($questionnaireDates as $item) {
            $datas[] = Carbon::parse($item->created_at)->format('d-m-Y'); // Data formatada
            $medias[] = round($item->averageScore, 1); // Média de cada avaliação
        }

        return view('admin.employees.show', compact('employee', 'datas', 'medias', 'questionnaireDates'));
    }

    public function test_details(int $id)
    {

        return view('admin.employees.test_details');
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
