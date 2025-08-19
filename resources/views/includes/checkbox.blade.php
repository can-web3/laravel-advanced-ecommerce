<div class="mb-3 form-check">
    <input
        type="checkbox"
        class="form-check-input {{ $errors->has($name) ? 'is-invalid' : '' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="1"
        {{ old($name, $checked ?? false) ? 'checked' : '' }}
        {{ ($required ?? false) ? 'required' : '' }}
    >

    <label class="form-check-label" for="{{ $name }}">
        {{ $title }} {!! ($required ?? false) ? '<span class="text-danger">*</span>' : '' !!}
    </label>

    @if ($errors->has($name))
        <div class="invalid-feedback d-block">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
