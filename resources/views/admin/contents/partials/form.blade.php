<div class="col-12">
    <label for="name" class="form-label">Título</label>

    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $content->title ?? '') }}" required>
</div>
<div class="col-12">
    <label for="link" class="form-label">Link</label>

    <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $content->link ?? '') }}" required>
</div>
<div class="col-12">
    <label for="content_type_id" class="form-label">Tipos</label>
    <select id="content_type_id" name="content_type_id" class="form-select bg-light" required>
        <option value="">--</option>
        @foreach ($contentTypes as $contentType)
            <option value="{{ $contentType->id }}"
                @if(isset($content->content_type_id))
                    @selected($content->content_type_id == $contentType->id)
                @endif>{{ $contentType->description }}
            </option>
        @endforeach
    </select>
</div>
