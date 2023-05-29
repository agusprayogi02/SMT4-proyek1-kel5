<div class="custom-control custom-radio mb-3">
    <input type="radio" class="custom-control-input" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" {{
        $attributes }}>
    <label class="custom-control-label" for="{{ $id }}">{{ $label }}</label>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
