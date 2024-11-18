<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function list(Request $request)
    {
        $contents = Content::where('title', 'like', '%' . $request->busca . '%')->orderBy('title', 'asc')->paginate(10);

        $totalContents = Content::all()->count();

        return view('home.contents.index', compact('contents', 'totalContents'));
    }

    public function index(Request $request)
    {
        $contents = Content::where('title', 'like', '%' . $request->busca . '%')->orderBy('title', 'asc')->paginate(10);

        $totalContents = Content::all()->count();

        return view('admin.contents.index', compact('contents', 'totalContents'));
    }

    public function create()
    {
        $contentTypes = ContentType::all()->sortBy('name');
        return view('admin.contents.create', compact('contentTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'content_type_id' => 'required|string',
        ]);

        Content::create($validatedData);

        return redirect()->route('contents.index')->with('success', 'Conteúdo cadastrado com sucesso');
    }

    public function show($id)
{
    $content = Content::find($id);

    if (!$content) {
        return redirect()->route('contents.index')->with('error', 'Conteúdo não encontrado');
    }

    // Extrair o ID do vídeo do link do YouTube
    preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $content->link, $matches);
    $videoId = $matches[1] ?? null;

    return view('admin.contents.show', compact('content', 'videoId'));
}

    

    

    public function edit(int $id)
    {
        $content = Content::find($id);

        if (!$content) {
            return back();
        }

        $contentTypes = ContentType::all()->sortBy('name');

        return view('admin.contents.edit', compact('content', 'contentTypes'));
    }

    public function update(Request $request, int $id)
    {
        $content = Content::find($id);

        $content->fill($request->all());
        $content->save();

        return redirect()->route('contents.index')->with('success', 'Conteúdo alterado com sucesso!');
    }

    public function destroy(int $id)
    {
        $content = Content::find($id);

        $content->delete();

        return redirect()->route('contents.index')->with('success', 'Conteúdo excluído com sucesso.');
    }
}
