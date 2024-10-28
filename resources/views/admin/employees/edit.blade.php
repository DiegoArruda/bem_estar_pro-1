@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Cadastro de Colaborador')

@section('content')
    <div class="form">
        <h1 class="fs-2 mb-4">Alterar funcionário</h1>

        <form class="row g-3" method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
            {{-- Criar hash de segurança para submissão do formulário --}}
            @csrf
            @method('PUT')

            @include('admin.employees.partials.form')

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href="{{ route('employees.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
