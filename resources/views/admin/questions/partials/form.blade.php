<div class="col-12">
    <label for="description" class="form-label">Descrição</label>

    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $question->description ?? '') }}" required>
</div>

<div class="col-12">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-select bg-light" required>
        <option value="on" @if(isset($question->status)) @selected($question->status == 'on') @endif>Ativar</option>
        <option value="off" @if(isset($question->status)) @selected($question->status == 'off') @endif>Desativar</option>
    </select>
</div>

