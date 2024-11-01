@extends('home.layouts.test')

@section('title', 'BemEstar Pro - Questionário')

@section('content')
    <h1 class="fs-2 mb-5 text-center">Olá {{ session('name') }} como você sente hoje</h1>

    <form class="row g-3" method="POST" action="{{ route('home.tests.store') }}">
        @csrf
        <div class="container" style="max-width: 800px">
                <div class="bg-white rounded-4 p-md-5 p-4 mb-md-5 mb-4 shadow">
                    <h2 class="fs-4 ">Título</h2>
                    <div class="group-options">
                        <label for="option-idQuestao-idOpcao" class="option">
                            <input type="radio" value="" name="option-idQuestao" id="option-idQuestao-idOpcao" required>
                            <img src="/images/icon_5.png">
                            <span>Descricao</span>
                        </label>
                        <label for="option-idQuestao-idOpcao" class="option">
                            <input type="radio" value="" name="option-idQuestao" id="option-idQuestao-idOpcao" required>
                            <img src="/images/icon_4.png">
                            <span>Descricao</span>
                        </label>
                        <label for="option-idQuestao-idOpcao" class="option">
                            <input type="radio" value="" name="option-idQuestao" id="option-idQuestao-idOpcao" required>
                            <img src="/images/icon_3.png">
                            <span>Descricao</span>
                        </label>
                        <label for="option-idQuestao-idOpcao" class="option">
                            <input type="radio" value="" name="option-idQuestao" id="option-idQuestao-idOpcao" required>
                            <img src="/images/icon_2.png">
                            <span>Descricao</span>
                        </label>
                        <label for="option-idQuestao-idOpcao" class="option">
                            <input type="radio" value="" name="option-idQuestao" id="option-idQuestao-idOpcao" required>
                            <img src="/images/icon_1.png">
                            <span>Descricao</span>
                        </label>
                    </div>
                </div>
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
