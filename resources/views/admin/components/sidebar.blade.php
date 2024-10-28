<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 210px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="{{ asset('images/logo_bemestar_admin.png') }}" height="35px" alt="Logo BemEstar Pro">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-white btn btn-primary text-start">
                <i class="bi bi-bar-chart me-2 fs-5"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="nav-link text-white btn btn-primary text-start">
                <i class="bi bi-people me-2 fs-5"></i>Funcionários
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('departments.index') }}" class="nav-link text-white btn btn-primary text-start">
                <i class="bi bi-house-check me-2 fs-5"></i>Departamentos
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('questions.index')}}" class="nav-link text-white btn btn-primary text-start">
                <i class="bi bi-question-circle me-2 fs-5"></i>Questões
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contents.index')}}" class="nav-link text-white btn btn-primary text-start">
                <i class="bi bi-star me-2 fs-5"></i>Conteúdo
            </a>
        </li>
            <li class="nav-item">
                <a href="{{ route('users.index')}}" class="nav-link text-white btn btn-primary text-start">
                    <i class="bi bi-person-gear me-2 fs-5"></i>Usuários
                </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{-- <strong>{{ auth()->user()->name }}</strong> --}}
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            {{-- <li><a class="dropdown-item" href="{{ route('users.edit', auth()->user()->id) }}">Alterar dados</a>
            </li> --}}
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sair</a></li>
        </ul>
    </div>
</div>
