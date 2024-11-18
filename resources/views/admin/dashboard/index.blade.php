@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Dashboard')

@section('content')
    <h1 class="fs-2 mb-5">Dashboard</h1>

    <ul class="legenda">
        <li><img src="/images/icon_5.png" alt="Muito satisfeito"> Muito satisfeito</li>
        <li><img src="/images/icon_4.png" alt="Satisfeito"> Satisfeito</li>
        <li><img src="/images/icon_3.png" alt="Neutro"> Neutro</li>
        <li><img src="/images/icon_2.png" alt="Insatisfeito"> Insatisfeito</li>
        <li><img src="/images/icon_1.png" alt="Muito insatisfeito"> Muito insatisfeito</li>
    </ul>

    <p class="mb-4">Total de funcionários: {{ $totalEmployees }}</p>

    <div class="dashboard-container" style="padding: 20px;">
        <div class="dashboard" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 20px;">
            @foreach ($employees as $employee)
                @php
                    if ($employee->averageScore >= 4.0) {
                        $class = 'muito_satisfeito';
                    } elseif ($employee->averageScore >= 3.0) {
                        $class = 'satisfeito';
                    } elseif ($employee->averageScore >= 2.5) {
                        $class = 'neutro';
                    } elseif ($employee->averageScore >= 1.5) {
                        $class = 'insatisfeito';
                    } elseif ($employee->averageScore >= 1) {
                        $class = 'muito_insatisfeito';
                    } else {
                        $class = 'sem_avaliacao';
                    }
                @endphp

                <a href="{{ route('employees.show', $employee->id) }}" class="employee {{ $class }}">
                    <i class="bi bi-person-fill"></i>
                    <p>{{ $employee->name }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection