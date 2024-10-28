<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BemEstar Pro</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #48CFCB url(images/logo_fundo.png) no-repeat right bottom;
            height: 100vh;
        }
    </style>
</head>

<body class="p-5 d-flex align-items-center">
    <div class="container" style="max-width: 500px;">
        <div class="mb-4 mx-auto" style="max-width: 400px;">
            <img src="/images/logo_bemestar.png" class="img-fluid" alt="Logo BemEstar Pro">
        </div>

        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <div class="container bg-white rounded-4 p-5 shadow">
                @isset($_GET['msn'])
                    <div class="alert alert-danger text-center p-2">Área restrita. Realize o login para acessar.</div>
                @endisset

                @if (Session::get('erro'))
                    <div class="alert alert-danger text-center p-2">{{ Session::get('erro') }}</div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning text-center p-2">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="mb-3">
                    <label for="email" class="form-label fs-5">E-mail</label>
                    <input type="email" name="email" class="form-control form-control-lg bg-light" id="email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fs-5">Senha</label>
                    <input type="password" name="password" class="form-control form-control-lg bg-light" id="password"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg ">Entrar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
