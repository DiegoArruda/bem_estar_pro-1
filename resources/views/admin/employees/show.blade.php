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
        Gráfico de linhas entra aqui
    </section>

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
                    <td class="text-center">Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Qual é a sua percepção sobre o equilíbrio entre vida pessoal e profissional?</td>
                    <td class="text-center">Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia o impacto do ambiente de trabalho na sua saúde mental?</td>
                    <td class="text-center">Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia seu estado emocional ao final do expediente?</td>
                    <td class="text-center">Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia o seu nível de bem-estar com seu superior imediato?</td>
                    <td class="text-center">Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td>Como você avalia o seu nível de bem-estar com a equipe?</td>
                    <td class="text-center">Satisfeito</td>
                </tr>
                <tr class="align-middle">
                    <td><b>Média</b></td>
                    <td class="text-center"><b>0.0</b></td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection
