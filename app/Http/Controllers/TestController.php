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
        $input = $request->all();
        $input['employee_id'] = session('id');
        $test = Test::create($input);

        $questions = Question::where('status', 'on')->orderBy('id', 'desc')->get();

        foreach($questions AS $question){
            $input['question_id'] = $input['question-'.$question->id];
            $input['option_id'] = $input['question-option-'.$question->id];
            $input['test_id'] = $test['id'];
            // echo  $input['employee_id']."-".$input['question_id']."-".$input['option_id'].'<br>';
            TestQuestion::create($input);
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
