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
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tipo</th>
                    <th scope="col" width="180px">Ações</th>
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

                            <!-- Botão para Deletar -->
                            <a href="" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $content->id }}">
                                <i class="bi bi-trash"></i>
                            </a>

                            <!-- Botão de prévia de vídeo -->
                            @if($content->content_type_id === 2)
                                <button type="button" class="btn btn-info" title="Ver Vídeo" onclick="showVideo('{{ $content->link }}')">
                                    <i class="bi bi-play-circle"></i>
                                </button>
                            @endif

                            <!-- Modal de exclusão -->
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

    <!-- Modal para exibir vídeo -->
    <div id="videoModal" class="modal fade" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Ver Vídeo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <!-- Para YouTube ou vídeos locais -->
                    <div id="videoContainer"></div>
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
        // Função para exibir o modal de vídeo
        function showVideo(link) {
            const videoContainer = document.getElementById('videoContainer');
            let videoHtml = '';

            if (link.includes('youtube.com') || link.includes('youtu.be')) {
                // Embed de vídeo do YouTube
                const videoId = link.split('v=')[1]?.split('&')[0] || link.split('/').pop();
                videoHtml = `
                    <iframe
                        width="100%"
                        height="400"
                        src="https://www.youtube.com/embed/${videoId}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>`;
            } else {
                // Vídeo local (MP4)
                videoHtml = `
                    <video controls style="width: 100%;">
                        <source src="${link}" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>`;
            }

            // Insere o player no modal
            videoContainer.innerHTML = videoHtml;

            // Exibe o modal
            const videoModal = new bootstrap.Modal(document.getElementById('videoModal'));
            videoModal.show();
        }
    </script>
@endsection
