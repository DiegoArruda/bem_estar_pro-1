@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Dashboard')

@section('content')
    <h1 class="fs-2 mb-5">Dashboard</h1>

    <ul class="legenda">
        <li>
            <img src="/images/icon_5.png" alt="Muito satisfeito"> Muito satisfeito
        </li>
        <li>
            <img src="/images/icon_4.png" alt="Satisfeito"> Satisfeito
        </li>
        <li>
            <img src="/images/icon_3.png" alt="Neutro"> Neutro
        </li>
        <li>
            <img src="/images/icon_2.png" alt="Insatisfeito"> Insatisfeito
        </li>
        <li>
            <img src="/images/icon_1.png" alt="Muito insatisfeito"> Muito insatisfeito
        </li>
    </ul>

    <p class="mb-4">Total de funcionários: {{ $totalEmployees }}</p>

    {{--
        Classes para aplicar na tag "a" de acordo com a média da avaliação do funcionário
        Se média >= 4.0
            classe -> muito_satisfeiro
        Se média => 3.0 e < 4.0
            class -> satisfeiro
        Se média >= 2.5 e < 3.0
            classe -> neutro
        Se média >= 1.5 e < 2.5
            classe -> insatisfeito
        Se média >= 1 e < 1.5
            classe -> muito_insatisfeito
        Se media = 0
            classe -> sem_avaliacao
    --}}


    <div class="dashboard">
        @foreach ($employees as $employee)
            <a href="{{ route('employees.show', $employee->id) }}" class="employee sem_avaliacao">
                <i class="bi bi-person-fill"></i>
                <p>{{ $employee->name }}</p>
            </a>
        @endforeach
    </div>
@endsection
