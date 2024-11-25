@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Funcionários')

@section('content')
<h1 class="fs-2 mb-4">Detalhes de avaliação</h1>

<h2 class="fs-5 mb-4">{{ $test[0]->name }}</h2>

<h3 class="fs-5 mb-4">Data da avaliação: {{ date('d/m/Y', strtotime($test[0]->created_at)) }}</h3>

<section class="historico-avaliacoes mb-3 bg-light p-3 rounded-4">
    <table class="table">
        <thead class="table-secondary">
            <tr class="text-center">
                <th>Questão</th>
                <th  width="250">Avaliação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                @php
                    if ($question->weight == 5) {
                        $icon = '/images/icon_5.png';
                        $label = 'Muito Satisfeito';
                    } elseif ($question->weight == 4) {
                        $icon = '/images/icon_4.png';
                        $label = 'Satisfeito';
                    } elseif ($question->weight == 3) {
                        $icon = '/images/icon_3.png';
                        $label = 'Neutro';
                    } elseif ($question->weight == 2) {
                        $icon = '/images/icon_2.png';
                        $label = 'Insatisfeito';
                    } elseif ($question->weight == 1) {
                        $icon = '/images/icon_1.png';
                        $label = 'Muito Insatisfeito';
                    } else {
                        $label = 'Sem Avaliação';
                    }
                @endphp
                <tr class="align-middle">
                    <td>{{ $question->description }}</td>
                    <td><img src="{{$icon}}" alt="{{$label}}"> {{$label}}</td>
                </tr>
            @endforeach
                <td></td>
                <td><strong>Média: {{ $average }}</strong></td>
        </tbody>
    </table>

</section>

<section class="bg-light p-3 rounded-4">
    <h3 class="fs-5 mb-4">Comentário:</h3>

    @if ($test[0]->comment)
        {{ $test[0]->comment }}
    @else
        <p>Sem comentário cadastrado</p>
    @endif

</section>

@endsection