@extends('home.layouts.test')

@section('title', 'BemEstar Pro - Questionário')

@section('content')
    <h1 class="fs-2 mb-5 text-center">Olá {{ session('name') }} como você sente hoje</h1>

    <form class="row g-3" method="POST" action="{{ route('home.tests.store') }}">
        @csrf
        <div class="container" style="max-width: 800px">
                <div class="bg-white rounded-4 p-md-5 p-4 mb-md-5 mb-4 shadow">
                    @foreach ($questions as $question)
                    <div class="container" style="max-width: 800px">
                            <div class="bg-white rounded-4 p-md-5 p-4 mb-md-5 mb-4 shadow">
                                <h2 class="fs-4 ">{{$question->description}}</h2>
                                @foreach ($options as $option)
                                <div class="group-options">
                                    <label for="option_{{ $question->id }}_{{ $option->id }}" class="option">
                                        <input type="radio" value="" name="question_{{ $question->id }}" id="option_{{ $question->id }}_{{ $option->id }}" required>
                                        <img src="{{'/images/icon_' . $option->id . '.png' }}">
                                        <span>{{$option->description}}</span>
                                    </label>
                                </div>
                                @endforeach
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
        </div>
    </form>
@endsection
