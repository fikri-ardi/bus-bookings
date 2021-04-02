<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <select id="{{ $field }}" class="form-control" name="{{ $field }}">
        <option disabled selected>Choose a {{ $label }}</option>
        {{ $slot }}
    </select>
    @error($field)
    <small class="text-danger" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>