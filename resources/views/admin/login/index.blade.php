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

<body class="p-5">
    <div class="container" style="max-width: 500px;">
        <div class="mb-3 mx-auto" style="max-width: 400px;">
            <img src="/images/logo_bemestar.png" class="img-fluid" alt="Logo BemEstar Pro">
        </div>
        <form action="{{ route('employees.index') }}">
            <div class="container bg-white rounded-4 p-5">
                <div class="mb-3">
                    <label for="email" class="form-label fs-5">E-mail</label>
                    <input type="email" class="form-control form-control-lg bg-light" id="eamil">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label fs-5">Senha</label>
                    <input type="password" class="form-control form-control-lg bg-light" id="senha">
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