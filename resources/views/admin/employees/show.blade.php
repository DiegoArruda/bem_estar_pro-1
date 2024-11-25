@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Funcionários')

@section('content')
    <h1 class="fs-2 mb-4">Histório de funcionário</h1>

    <h2 class="fs-5 mb-4">Nome do funcionário</h2>

    <section class="dados-funcionario">
        <table class="table mb-5">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Idade</th>
                    <th>Função</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <th class="text-center">{{ $employee->id }}</th>
                    <td class="text-center">{{ $employee->name }}</td>
                    <td class="text-center">{{ $employee->role }}</td>
                    <td class="text-center">{{ $employee->department->name }}</td>
                </tr>
            </tbody>
        </table>
    </section>

    <h2 class="fs-4 mb-4">Gráfico de avaliações</h2>

    <section class="grafico-avaliacoes mb-5 bg-light p-4 rounded-3">
        <canvas id="myChart" style="width: 100%; height: 300px;"></canvas>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: <?php echo json_encode($datas); ?>,  // Data (labels)
            datasets: [{
                label: 'Média',
                // Dados das médias gerados dinamicamente no PHP
                data: <?php echo json_encode($medias); ?>,  // Médias
                borderWidth: 3
            }]
        },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        min: 1,
                        max: 5,
                    }
                }
            }
        });
    </script>

    <h2 class="fs-4 mb-4">Histório de avaliações</h2>

    <section class="historico-avaliacoes mb-5 bg-light p-3 rounded-4">
        <table class="table">
            <thead class="table-secondary">
                <tr class="text-center">
                    <th>Data avaliação</th>
                    <th width="250">Média</th>
                    <th width="80">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testsEmployee as $test)
                    @php
                        if ($test->averageScore >= 4.0) {
                            $icon = '/images/icon_5.png';
                            $label = 'Muito Satisfeito';
                        }elseif ($test->averageScore >= 3.0) {
                            $icon = '/images/icon_4.png';
                            $label = 'Satisfeito';
                        }elseif ($test->averageScore >= 2.5) {
                            $icon = '/images/icon_3.png';
                            $label = 'Neutro';
                        }elseif ($test->averageScore >= 1.5) {
                            $icon = '/images/icon_2.png';
                            $label = 'Insatisfeito';
                        }elseif ($test->averageScore >= 1.0) {
                            $icon = '/images/icon_1.png';
                            $label = 'Muito Insatisfeito';
                        }else{
                           $label = 'Sem Avaliação';
                        }
                    @endphp
                <tr class="align-middle">
                    <td>{{ date('d/m/Y', strtotime($test->created_at)) }}</td>
                    <td>
                        <img src="{{$icon}}" alt="{{$label}}"> {{$label}} ({{ number_format($test->averageScore, 1) }})
                    </td>
                    <td>
                        <a href="{{ route('employees.test.details', $test->id) }}" title="Detalhar" class="btn btn-primary">
                            <i class="bi bi-card-list"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection
