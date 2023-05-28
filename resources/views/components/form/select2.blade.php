<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-control select2" id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>
        <option value="">Pilih {{ $label }}</option>
        {{ $slot }}
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>