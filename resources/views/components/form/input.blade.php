<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
        value="{{ $value }}" placeholder="Enter {{ $label }}" {{ $attributes }}>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>