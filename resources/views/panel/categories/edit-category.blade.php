@extends('layouts.panel')

@section('title', 'Kategori Düzenle')

@section('content')
    @include('includes.panel.section-header', [
        'title' => 'Kategori Düzenle'
    ])

    <form action="{{ route('panel.categories.update', $category) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- name --}}
        @include('includes.input', [
            'title' => 'Adı',
            'name' => 'name',
            'value' => $category->name
        ])

        {{-- parent_id --}}
        <div class="mb-4">
            <label for="parent_id" class="form-label">Üst Kategori</label>
            <select class="select2 form-select" name="parent_id" id="parent_id" data-placeholder="Üst Kategori Seçiniz">
                <option></option>
                @foreach ($categories as $c)
                    <option
                        value="{{ $c->id }}"
                        {{ old('parent_id', $c->id) == $category->parent_id ? 'selected' : '' }}
                    >
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @include('includes.form-submit')
    </form>
@endsection
