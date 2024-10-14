@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Cadastro de Colaborador')

@section('content')
    <h1 class="fs-2 mb-3">Cadastro de funcionário</h1>

    <form class="row g-3" method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @include('admin.employees.partials.form')

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
