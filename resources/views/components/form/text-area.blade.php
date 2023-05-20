<div class="mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" {{ $attributes
        }}>{{ $value }}</textarea>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>