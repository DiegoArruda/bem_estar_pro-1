@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Editar Departamento')

@section('content')
<h1 class="fs-2 mb-3">Editar Departamento</h1>

<form class="row g-3" method="POST" action="{{ route('departments.update', $department->id) }}">
    @csrf
    @method('PUT')

    @include('admin.departments.partials.form')

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('departments.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
</form>
@endsection