<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" placeholder="Input {{ $label }}"
        required>{{ $value }}</textarea>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>