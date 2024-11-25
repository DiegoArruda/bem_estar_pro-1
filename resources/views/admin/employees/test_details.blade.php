@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Funcionários')

@section('content')
<h1 class="fs-2 mb-4">Detalhes de avaliação</h1>

<h2 class="fs-5 mb-4">Nome do funcionário</h2>

<h3 class="fs-5 mb-4">Avaliação: 00/00/0000</h3>

<section class="historico-avaliacoes mb-5 bg-light p-3 rounded-4">
    <table class="table">
        <thead class="table-secondary">
            <tr class="text-center">
                <th>Questão</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($test as $questions)
                        @php
                            if ($questions->weight == 5) {
                                $icon = '/images/icon_5.png';
                                $label = 'Muito Satisfeito';
                            } elseif ($questions->weight == 4) {
                                $icon = '/images/icon_4.png';
                                $label = 'Satisfeito';
                            } elseif ($questions->weight == 3) {
                                $icon = '/images/icon_3.png';
                                $label = 'Neutro';
                            } elseif ($questions->weight == 2) {
                                $icon = '/images/icon_2.png';
                                $label = 'Insatisfeito';
                            } elseif ($questions->weight == 1) {
                                $icon = '/images/icon_1.png';
                                $label = 'Muito Insatisfeito';
                            } else {
                                $label = 'Sem Avaliação';
                            }
                        @endphp
                        <tr class="align-middle">
                            <td>{{ $questions->description }}</td>
                            <td><img src="{{$icon}}" alt="{{$label}}" class="ms-2"> {{$label}}</td>
                        </tr>
            @endforeach

        </tbody>
    </table>
</section>

@endsection