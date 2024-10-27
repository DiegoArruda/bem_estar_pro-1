@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Usuários')

@section('content')
    <x-btnCreate>
        <x-slot name="route">{{ route('users.create') }}</x-slot>
        <x-slot name="title">Cadastrar Usuário</x-slot>
    </x-btnCreate>

    <h1 class="fs-2 mb-3">Usuários</h1>

    <p>Total de usuários: {{ $totalUsers }}</p>

    <x-busca>
        <x-slot name="rota">{{ route('users.index') }}</x-slot>
        <x-slot name="tipo">Buscar usuário</x-slot>
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
                    <th scope="col">Nome de Usuário</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="110px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="align-middle">
                        <th class="text-center" scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                            <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}"><i class="bi bi-trash"></i></a>
                            <x-modalDelete>
                                <x-slot name="id">{{ $user->id }}</x-slot>
                                <x-slot name="tipo">usuário</x-slot>
                                <x-slot name="nome">{{ $user->name }}</x-slot>
                                <x-slot name="rota">users.destroy</x-slot>
                            </x-modalDelete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($totalUsers != 0 && $users->count() == 0)
            <div class="text-center alert alert-warning">Usuário não encontrado</div>
        @endif
    </div>

    <style>
        .pagination {
            justify-content: center;
        }
    </style>
    {{ $users->links() }}
@endsection
