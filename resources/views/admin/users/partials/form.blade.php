<div class="col-12">
    <label for="name" class="form-label">Nome de Usuário</label>
    <input type="text" class="form-control bg-light" id="name" name="name" value="{{ $user->name ?? "" }}" required>
</div>

<div class="col-12">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control bg-light" id="email" name="email" value="{{ $user->email ?? "" }}" required>
</div>
<div class="col-12">
    <label for="password" class="form-label">Senha</label>
    <input type="password" class="form-control bg-light" id="password" name="password" minlength="6" value="">
    <p class="text-danger">Digite um senha com no mínimo 6 caracteres</p>
</div>
