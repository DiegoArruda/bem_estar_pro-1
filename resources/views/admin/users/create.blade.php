@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Criar Usuário')

@section('content')
    <div class="form">
        <h1 class="fs-2 mb-4">Criar Usuário</h1>

        <form class="row g-3" method="POST" action="{{ route('users.store') }}">
            @csrf

            @include('admin.users.partials.form')

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Criar</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
