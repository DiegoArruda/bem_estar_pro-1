@extends('home.layouts.test')

@section('title', 'BemEstar Pro - Questionário')

@section('content')
    <h1 class="fs-2 mb-5 text-center">Olá {{ session('name') }} como você sente hoje?</h1>
    @if (session('success'))
        <div class="alert alert-success text-center mb-5"> {{ session('success') }}</div>
    @endif
    <form class="row g-3" method="POST" action="{{ route('home.tests.store') }}">
        @csrf
        <div class="container" style="max-width: 800px">
            @foreach ($questions as $question)
                <input type="hidden" value="{{ $question->id }}" name="question-{{ $question->id }}">
                <div class="bg-white rounded-4 p-md-5 p-4 mb-md-5 mb-4 shadow">
                    <h2 class="fs-4 ">{{ $question->description }}</h2>
                    <div class="group-options">
                        @foreach ($options as $option)
                            <label for="option-{{ $question->id }}-{{ $option->id }}" class="option">
                                <input type="radio" value="{{ $option->id }}" name="question-option-{{ $question->id }}" id="option-{{ $question->id }}-{{ $option->id }}" required>
                                <img src="/images/icon_{{ $option->id }}.png">
                                <span>{{ $option->description }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="bg-white rounded-4 p-md-5 p-4 mb-md-5 mb-4 shadow">
                <label for="comment" class="form-label">Comentário</label>
                <textarea class="form-control" id="comment" name="comment" style="height: 100px"></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="text-center btn btn-lg btn-primary mb-5">Enviar</button>
            </div>
        </div>
    </form>
@endsection
