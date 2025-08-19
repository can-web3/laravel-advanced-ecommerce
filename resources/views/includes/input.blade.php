<div class="mb-3">
    <label
        for="{{ $name }}"
        class="form-label"
    >
        {{ $title }}: {!! ($required ?? true) ? '<span class="text-danger">*</span>' : '' !!}
    </label>

    <input
        type="{{ $type ?? 'text' }}"
        class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name) }}"
        placeholder="{{ $title }} giriniz"
        {{ ($required ?? true) ? 'required' : '' }}
    >

    @if ($errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->first($name) }}
        </div>
    @endif
</div>
