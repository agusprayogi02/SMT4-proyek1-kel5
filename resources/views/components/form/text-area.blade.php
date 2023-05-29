<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" cols="3" rows="2" class="form-control @error($name) is-invalid @enderror"
        id="{{ $name }}" {{ $attributes }}>{{ $value }}</textarea>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>