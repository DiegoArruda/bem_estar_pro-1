@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Lista de Questões')

@section('content')
    <x-btnCreate>
        <x-slot name="route">{{ route('questions.create') }}</x-slot>
        <x-slot name="title">Cadastrar Questão</x-slot>
    </x-btnCreate>

    <h1 class="fs-2 mb-3">Questões</h1>

    <p>Total de questões cadastradas: {{ $totalQuestions }}</p>

    <x-busca>
        <x-slot name="rota">{{ route('questions.index') }}</x-slot>
        <x-slot name="tipo">Buscar questão</x-slot>
    </x-busca>

    @if (session('success'))
        <div class="alert alert-success text-center"> {{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Descrição</th>
                    <th>Status</th>
                    <th width="110">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr class="align-middle">
                        <td>{{ $question->description }}</td>
                        <td class="text-center">{{ $question->status }}</td>
                        <td>
                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                            <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $question->id }}"><i class="bi bi-trash"></i></a>
                            {{-- Inseri o componente modal na view --}}
                            <x-modalDelete>
                                <x-slot name="id">{{ $question->id }}</x-slot>
                                <x-slot name="tipo">questão</x-slot>
                                <x-slot name="nome">{{ $question->description }}</x-slot>
                                <x-slot name="rota">questions.destroy</x-slot>
                            </x-modalDelete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($totalQuestions != 0 && $question->count() == 0)
            <div class="text-center alert alert-warning">Departamento não encontrado</div>
        @endif
    </div>

    <style>
        .pagination{
            justify-content: center;
        }
    </style>
    {{ $questions->links() }}
@endsection
