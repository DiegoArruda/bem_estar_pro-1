@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Conteúdos')

@section('content')
    <x-btnCreate>
        <x-slot name="route">{{ route('contents.create') }}</x-slot>
        <x-slot name="title">Cadastrar Conteúdo</x-slot>
    </x-btnCreate>

    <h1 class="fs-2 mb-3">Conteúdos</h1>

    <p>Total de conteúdos: {{ $totalContents }}</p>

    <x-busca>
        <x-slot name="rota">{{ route('contents.index') }}</x-slot>
        <x-slot name="tipo">Buscar conteúdo</x-slot>
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
                    <th scope="col">Título</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" width="110px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr class="align-middle">
                        <th class="text-center" scope="row">{{ $content->id }}</th>
                        {{-- <td class="text-center">
                            @if (@empty($employee->foto))
                                <img src="/images/sombra_funcionario.jpg" alt="Foto" class="img-thumbnail" width="70">
                            @else
                                <img src="{{ url("storage/employees/$employee->foto") }}" alt="Fotos" class="img-thumbnail" width="70">
                            @endif
                        </td> --}}
                        <td>{{ $content->title }}</td>
                        <td class="text-center">{{ $content->link }}</td>
                        <td class="text-center">{{ $content->contentType->description }}</td>
                        <td>
                            <a href="{{ route('contents.edit', $content->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                            <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $content->id }}"><i class="bi bi-trash"></i></a>
                            {{-- Inseri o componente modal na view --}}
                            <x-modalDelete>
                                <x-slot name="id">{{ $content->id }}</x-slot>
                                <x-slot name="tipo">conteúdo</x-slot>
                                <x-slot name="nome">{{ $content->title }}</x-slot>
                                <x-slot name="rota">contents.destroy</x-slot>
                            </x-modalDelete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($totalContents != 0 && $contents->count() == 0)
            <div class="text-center alert alert-warning">Conteúdo não encontrado</div>
        @endif
    </div>

    <style>
        .pagination{
            justify-content: center;
        }
    </style>
    {{ $contents->links() }}
@endsection
