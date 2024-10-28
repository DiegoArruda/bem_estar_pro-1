@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Editar Questão')

@section('content')
    <div class="form">
        <h1 class="fs-2 mb-4">Editar Questão</h1>

        <form class="row g-3" method="POST" action="{{ route('questions.update', $question->id) }}">
            @csrf
            @method('PUT')

            @include('admin.questions.partials.form')

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('questions.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
