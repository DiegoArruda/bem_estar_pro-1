@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Conteúdos')

@section('content')
    <x-btnCreate>
        <x-slot name="route">{{ route('contents.create') }}</x-slot>
        <x-slot name="title">Cadastrar Conteúdo</x-slot>
    </x-btnCreate>

    <h1 class="fs-2 mb-4">Conteúdos</h1>

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
                    <th scope="col">Título</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $content)
                    <tr class="align-middle">
                        <th class="text-center" scope="row">{{ $content->id }}</th>
                        <td>{{ $content->title }}</td>
                        <td class="text-center">{{ $content->link }}</td>
                        <td class="text-center">{{ $content->contentType->description }}</td>
                        <td class="text-center">
                            <!-- Botão para Editar -->
                            <a href="{{ route('contents.edit', $content->id) }}" title="Editar" class="btn btn-primary">
                                <i class="bi bi-pen"></i>
                            </a>

                            <!-- Botão para Deletar (com modal) -->
                            <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $content->id }}">
                                <i class="bi bi-trash"></i>
                            </a>

                            <!-- Condição para exibir o botão de prévia apenas para vídeos -->
                            @if($content->content_type_id === 2)
                                <button onclick="showVideo('{{ $content->link }}')" title="Ver Vídeo" class="btn btn-info">
                                    <img src="/images/video.png" alt="Prévia do vídeo" style="width: 20px; height: 20px;">
                                </button>
                            @endif

                            <!-- Modal para confirmação de exclusão -->
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

    <!-- Modal para exibir o vídeo -->
    <div id="videoModal" class="modal fade" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Ver Vídeo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <video id="videoPlayer" controls style="width: 100%;">
                        <source src="" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>
                </div>
            </div>
        </div>
    </div>

    <style>
        .pagination {
            justify-content: center;
        }
    </style>

    {{ $contents->links() }}

    <script>
        // Função para exibir o modal com o vídeo
        function showVideo(link) {
            // Define o link do vídeo no player do modal
            document.getElementById('videoPlayer').src = link;
            // Exibe o modal
            var videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
            videoModal.show();
        }
    </script>
@endsection

