@extends('home.layouts.default')

@section('title', 'BemEstar Pro - Indicação de Conteúdos')

@section('content')
    <div class="row g-5">
        <h1 class="fs-1 mb-3 text-center">Conteúdo sobre bem-estar</h1>

        @foreach($contents as $content)
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    {{-- Seleciona a imagem com base no content_type_id --}}
                    @php
                        $imagePath = '';
                        switch ($content->content_type_id) {
                            case 1:
                                $imagePath = asset('images/artigo.png');
                                break;
                            case 2:
                                $imagePath = asset('images/video.png');
                                break;
                            case 3:
                                $imagePath = asset('images/podcast.png');
                                break;
                            default:
                                $imagePath = asset('images/default.png'); // Imagem padrão, caso precise
                        }
                    @endphp
                    <img src="{{ $imagePath }}" class="card-img-top" alt="{{ $content->title }}">
                    <div class="card-body">
                        <p>{{ date('d/m/Y', strtotime($content->created_at)) }}</p>
                        <h5 class="card-title mb-3">{{ $content->title }}</h5>
                        {{-- Link dinâmico para o conteúdo --}}
                        <a href="{{ $content->link }}" class="btn btn-primary" target="_blank">Acessar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginação --}}
    <div class="d-flex justify-content-center">
        {{ $contents->links() }}
    </div>
@endsection
