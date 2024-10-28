@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Criar Questão')

@section('content')
    <div class="form">
        <h1 class="fs-2 mb-4">Criar Questão</h1>

        <form class="row g-3" method="POST" action="{{ route('questions.store') }}">
            @csrf

            @include('admin.questions.partials.form')

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Criar</button>
                <a href="{{ route('questions.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
