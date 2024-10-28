@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Cadastro de Conteúdo')

@section('content')
    <h1 class="fs-2 mb-3">Cadastro de conteúdo</h1>

    <form class="row g-3" method="POST" action="{{ route('contents.store') }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @include('admin.contents.partials.form')

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('contents.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
