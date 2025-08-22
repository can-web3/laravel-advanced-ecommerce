@extends('layouts.panel')

@section('title', 'Kategori Ekle')

@section('content')
    @include('includes.panel.section-header', [
        'title' => 'Kategori Ekle'
    ])

    <form action="{{ route('panel.categories.store') }}" method="POST">
        @csrf
        
        {{-- name --}}
        @include('includes.input', [
            'title' => 'Adı',
            'name' => 'name',
        ])

        {{-- parent_id --}}
        <div class="mb-4">
            <label for="parent_id" class="form-label">Üst Kategori</label>
            <select class="select2 form-select" name="parent_id" id="parent_id" data-placeholder="Üst Kategori Seçiniz">
                <option></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- is_active --}}
        @include('includes.checkbox', [
            'title' => 'Aktif',
            'name' => 'is_active',
            'checked' => true
        ])

        @include('includes.form-submit')
    </form>
@endsection
