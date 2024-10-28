@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Dashboard')

@section('content')
    <h1 class="fs-2 mb-4">Dashboard</h1>

    <x-busca>
        <x-slot name="rota">{{ route('dashboard.index') }}</x-slot>
        <x-slot name="tipo">Buscar funcionário</x-slot>
    </x-busca>


    {{-- <style>
        .pagination{
            justify-content: center;
        }
    </style>
    {{ $employees->links() }} --}}
@endsection
