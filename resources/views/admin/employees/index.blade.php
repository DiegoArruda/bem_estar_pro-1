@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Funcionários')

@section('content')
    <x-btnCreate>
        <x-slot name="route">{{ route('employees.create') }}</x-slot>
        <x-slot name="title">Cadastrar Funcionário</x-slot>
    </x-btnCreate>

    <h1 class="fs-2 mb-4">Funcionários</h1>

    <p>Total de funcionários: {{ $totalEmployees }}</p>

    <x-busca>
        <x-slot name="rota">{{ route('employees.index') }}</x-slot>
        <x-slot name="tipo">Buscar funcionário</x-slot>
    </x-busca>

    @if (session('success'))
        <div class="alert alert-success text-center"> {{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    {{-- <th scope="col">Foto</th> --}}
                    <th scope="col">Nome</th>
                    <th scope="col">Função</th>
                    <th scope="col">Departamento</th>
                    <th scope="col" width="110px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr class="align-middle">
                        <th class="text-center" scope="row">{{ $employee->id }}</th>
                        {{-- <td class="text-center">
                            @if (@empty($employee->foto))
                                <img src="/images/sombra_funcionario.jpg" alt="Foto" class="img-thumbnail" width="70">
                            @else
                                <img src="{{ url("storage/employees/$employee->foto") }}" alt="Fotos" class="img-thumbnail" width="70">
                            @endif
                        </td> --}}
                        <td>{{ $employee->name }}</td>
                        <td class="text-center">{{ $employee->role }}</td>
                        <td class="text-center">{{ $employee->department->name }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                            <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $employee->id }}"><i class="bi bi-trash"></i></a>
                            {{-- Inseri o componente modal na view --}}
                            <x-modalDelete>
                                <x-slot name="id">{{ $employee->id }}</x-slot>
                                <x-slot name="tipo">funcionário</x-slot>
                                <x-slot name="nome">{{ $employee->name }}</x-slot>
                                <x-slot name="rota">employees.destroy</x-slot>
                            </x-modalDelete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($totalEmployees != 0 && $employees->count() == 0)
            <div class="text-center alert alert-warning">Funcionário não encontrado</div>
        @endif
    </div>

    <style>
        .pagination{
            justify-content: center;
        }
    </style>
    {{ $employees->links() }}
@endsection
