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
                    <th class="text-center">???</th>
                    <td class="text-center">???</td>
                    <td class="text-center">???</td>
                    <td class="text-center">???</td>
                </tr>
            </tbody>
        </table>
    </section>

    <h2 class="fs-4 mb-4">Gráfico de avaliações</h2>

    <section class="grafico-avaliacoes mb-5 bg-light p-3 rounded-3">
        <canvas id="myChart" style="width: 100%; height: 300px;"></canvas>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                // Aqui entra as datas as avaliações do funcionário
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Média',
                    // Aqui entra a média de cada avaliação
                    data: [5, 3, 4, 1, 2, 4],
                    borderWidth: 3
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    </script>

    <h2 class="fs-4 mb-4">Histório de avaliações</h2>

    <section class="historico-avaliacoes mb-5 bg-light p-3 rounded-4">
        <p><b>Data da avaliação:</b> 00/00/0000</p>
        <table class="table">
            <thead class="table-secondary">
                <tr class="text-center">
                    <th>Questões</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <td>Como você avalia o seu estado emocional atualmente?</td>
                    <td><img src="/images/icon_5.png"> Muito Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Qual é a sua percepção sobre o equilíbrio entre vida pessoal e profissional?</td>
                    <td><img src="/images/icon_4.png"> Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia o impacto do ambiente de trabalho na sua saúde mental?</td>
                    <td><img src="/images/icon_3.png"> Neutro</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia seu estado emocional ao final do expediente?</td>
                    <td><img src="/images/icon_2.png"> Insatisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia o seu nível de bem-estar com seu superior imediato?</td>
                    <td><img src="/images/icon_2.png"> Insatisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia o seu nível de bem-estar com a equipe?</td>
                    <td><img src="/images/icon_1.png"> Muito insatisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td><b>Média</b></td>
                    <td><b>0.0</b></td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection
