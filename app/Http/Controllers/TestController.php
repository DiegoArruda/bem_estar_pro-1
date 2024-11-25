<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::where('status', 'on')->orderBy('id', 'desc')->get();
        $options = Option::query()->orderBy('weight', 'desc')->get();

        return view('home.tests.index', compact('questions', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Obtenha todas as perguntas ativas
    $questions = Question::where('status', 'on')->orderBy('id', 'desc')->get();

    // Crie regras de validação dinamicamente
    $rules = [];
    $messages = [];

    foreach ($questions as $question) {
        $rules["question-{$question->id}"] = 'required'; // Cada questão é obrigatória
        $rules["question-option-{$question->id}"] = 'required'; // Cada opção também é obrigatória

        $messages["question-{$question->id}.required"] = "Por favor, selecione uma resposta para a questão '{$question->description}'.";
        $messages["question-option-{$question->id}.required"] = "Por favor, escolha uma opção para a questão '{$question->description}'.";
    }

    // Realize a validação
    $validated = $request->validate($rules, $messages);

    // Se a validação passar, prossiga para salvar os dados
    $input = $request->all();
    $input['employee_id'] = session('id');

    $test = Test::create($input);

    foreach ($questions as $question) {
        TestQuestion::create([
            'test_id' => $test->id,
            'question_id' => $request->input("question-{$question->id}"),
            'option_id' => $request->input("question-option-{$question->id}"),
        ]);
    }

    return redirect()->route('home.tests.index')->with('success', 'Avaliação realizada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
