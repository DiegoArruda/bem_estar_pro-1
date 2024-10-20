<div class="col-12">
    <label for="name" class="form-label">Nome</label>

    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $department->name ?? '') }}" required>
</div>
