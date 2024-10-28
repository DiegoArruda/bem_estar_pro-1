@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Editar Usuário')

@section('content')
    <div class="form">
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        <h1 class="fs-2 mb-4">Editar Usuário</h1>

        <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            @include('admin.users.partials.form')

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
