@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Lista de Questões')

@section('content')
    <h1 class="fs-2 mb-3">Lista de Questões</h1>

    <x-btnCreate>
        <x-slot name="route">{{ route('questions.create') }}</x-slot>
        <x-slot name="title">Cadastrar Questão</x-slot>
    </x-btnCreate>
    
    <x-busca>
        <x-slot name="rota">{{ route('questions.index') }}</x-slot>
        <x-slot name="tipo">Buscar Questão</x-slot>
    </x-busca>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->description }}</td>
                    <td>{{ $question->status }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
