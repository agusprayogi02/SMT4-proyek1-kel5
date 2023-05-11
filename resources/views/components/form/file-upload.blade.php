<div class="mb-3">
    <label>{{ $label }}</label>
    <div class="custom-file">
        <label class="custom-file-label" for="{{ $name }}">Choose {{ $label }}</label>
        <input type="file" id="{{ $name }}" class="custom-file-input" name="{{ $name }}">
        @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>