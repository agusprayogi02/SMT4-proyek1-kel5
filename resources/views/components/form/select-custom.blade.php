<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="custom-select" id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>
        <option value="">Pilih {{ $label }}</option>
        {{ $slot }}
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
