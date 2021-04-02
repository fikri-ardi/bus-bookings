<div class="form-group">
    <label for="{{ $field }}">
        {{ ucwords(str_replace('_', ' ', $field)) }}
    </label>

    <input {{ $attributes }} class="form-control @error($field) is-invalid @enderror" id="{{ $field }}" name="{{ $field }}"
        value="{{ empty($model) ? old($field) : old($field) ?? $model->$field }}">

    @error($field)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>