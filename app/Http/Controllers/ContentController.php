<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contents = Content::where('title', 'like','%'.$request->busca.'%')->orderBy('title', 'asc')->paginate(10);

        $totalContents = Content::all()->count();

        // Receber os dados do banco através
        return view('admin.contents.index', compact('contents', 'totalContents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contentTypes = ContentType::all()->sortBy('name');
        return view('admin.contents.create', compact('contentTypes'));
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

        $validatedData = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'content_type_id' => 'required|string', // ou uma validação específica para URLs, caso seja o caso
        ]);

        // Insert de dados do usuário no banco
        Content::create($input);

        return redirect()->route('contents.index')->with('success','Conteúdo cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $content = Content::find($id);

        if(!$content){
            return back();
        }

        $contentTypes = ContentType::all()->sortBy('nome');

        return view('admin.contents.edit', compact('content','contentTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $input = $request->toArray();

        $content = Content::find($id);

        $content->fill($input);
        $content->save();
        return redirect()->route('contents.index')->with('success','Conteúdo alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $content = Content::find($id);

        // Apagando o registro no banco de dados
        $content->delete();

        return redirect()->route('contents.index')->with('success','Conteúdo exluído com sucesso.');
    }
}
