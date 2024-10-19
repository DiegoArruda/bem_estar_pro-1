@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Visualizar Questão')

@section('content')
    <h1 class="fs-2 mb-3">Detalhes da Questão</h1>

    <div>
        <strong>Título:</strong> {{ $question->title }} <br>
        <strong>Conteúdo:</strong> {{ $question->content }}
    </div>

    <a href="{{ route('questions.index') }}" class="btn btn-primary mt-3">Voltar</a>
@endsection
