<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="custom-select" id="{{ $name }}" name="{{ $name }}" {{ $attributes }}>
        <option value="">Pilih {{ $label }}</option>
        @foreach ($initValues as $item)
        <option value="{{ $item }}" {{ $item===$value ? 'selected' : '' }}>{{ $item }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
