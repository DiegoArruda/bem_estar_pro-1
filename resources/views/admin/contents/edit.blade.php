@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Cadastro de Conteúdo')

@section('content')
    <div class="form">
        <h1 class="fs-2 mb-4">Alterar conteúdo</h1>

        <form class="row g-3" method="POST" action="{{ route('contents.update', $content->id) }}" enctype="multipart/form-data">
            {{-- Criar hash de segurança para submissão do formulário --}}
            @csrf
            @method('PUT')

            @include('admin.contents.partials.form')

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href="{{ route('contents.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
