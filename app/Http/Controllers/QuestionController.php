<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $questions = Question::where('description', 'like','%'.$request->busca.'%')->orderBy('description', 'asc')->paginate(10);
        // Buscando todas as questões do banco de dados
        $totalQuestions = Question::all()->count(); 
        return view('admin.questions.index', compact('questions', 'totalQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornando a view para criar uma nova questão
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:4'
        ]);

        // Criar uma nova questão
        Question::create([
            'description' => $request->description,
            'status' => $request->status
            
        ]);

        return redirect()->route('questions.index')->with('success', 'Questão criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        // Retornando a view para mostrar uma única questão
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $question = Question::find($id);

        if(!$question){
            return back();
        }
        // Retornando a view para editar a questão
        return view('admin.questions.edit', compact('question'));

    }

    /**ti
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //buscando questão
        $question = Question::find($id);

        // Validação dos dados
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:3'
        ]);

        // Atualizar a questão
        $question->update([
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('questions.index')->with('success', 'Questão atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        // Excluir a questão
        //$question->delete();
       // return redirect()->route('questions.index')->with('success', 'Questão excluída com sucesso.');
    }
}