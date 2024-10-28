<div class="col-12">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control bg-light" id="name" name="name" value="{{ $employee->name ?? "" }}" required>
</div>
<div class="col-12">
    <label for="date_birth" class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control bg-light" id="date_birth" name="date_birth"  value="{{ $employee->date_birth ?? "" }}" required>
</div>
<div class="col-12">
    <label for="gender" class="form-label">Gênero</label>
    <select id="gender" name="gender" class="form-select bg-light" required>
        <option value=""></option>
        <option value="m" @if(isset($employee->gender)) @selected($employee->gender == 'm') @endif>Masculino</option>
        <option value="f" @if(isset($employee->gender)) @selected($employee->gender == 'f') @endif>Feminino</option>
    </select>
</div>
<div class="col-12">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control bg-light" id="cpf" name="cpf" minlength="11" maxlength="11" value="{{ $employee->cpf ?? "" }}" required>
</div>
<div class="col-12">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control bg-light" id="email" name="email" value="{{ $employee->email ?? "" }}" required>
</div>
<div class="col-12">
    <label for="role" class="form-label">Função</label>
    <input type="text" class="form-control bg-light" id="role" name="role" value="{{ $employee->role ?? "" }}" required>
</div>
<div class="col-12">
    <label for="department_id" class="form-label">Departamentos</label>
    <select id="department_id" name="department_id" class="form-select bg-light" required>
        <option value="">--</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}"
                @if(isset($employee->department_id))
                    @selected($employee->department_id == $department->id)
                @endif>{{ $department->name }}
            </option>
        @endforeach
    </select>
</div>
{{-- <div class="col-md-2">
    @if(isset($employee->foto))
        <img src="{{ asset("storage/funcionarios/$employee->foto") }}" class="img-thumbnail">
    @else
        <img src="{{ asset('images/sombra_funcionario.jpg') }}" class="img-thumbnail ">
    @endif
</div> --}}
{{-- <div class="col-md-6">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto">
</div> --}}
{{-- <div class="col-md-4">
    <label for="beneficios">Benefícios</label>
    <div>
        @foreach ($beneficios as $beneficio)
            <input type="checkbox" value="{{ $beneficio->id }}" name="beneficios[]" @if (isset($employee->beneficios))
                @checked(in_array($beneficio->id, $beneficio_selecionados))
            @endif> {{ $beneficio->descricao }}<br>
        @endforeach
    </div>
</div> --}}