@extends('layouts.panel')

@section('title', 'Kategoriler')

@section('content')
    @include('includes.panel.section-header', [
        'title' => 'Kategoriler',
        'plus' => true
    ])

    <div class="table-responsive">
        <table class="datatable table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Adı</th>
                    <th>Üst Kategori</th>
                    <th>Durum</th>
                    <th style="width: 150px;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->parent ? $category->parent->name : '-' }}</td>
                        <td>{!! $category->status !!}</td>
                        <td>
                            <a href="{{ route('panel.categories.edit', $category) }}" class="btn btn-sm btn-warning">Düzenle</a>
                            @if($category->trashed())
                                <button
                                    type="button"
                                    data-action="{{ route('panel.categories.destroy', $category->id) }}"
                                    data-text="{{ $category->name }} kategorisini geri yüklemek istiyor musunuz?"
                                    class="btn-delete btn btn-sm btn-success">
                                        Geri Yükle
                                </button>
                            @else
                                <button
                                    type="button"
                                    data-action="{{ route('panel.categories.destroy', $category->id) }}"
                                    data-text="{{ $category->name }} kategorisini silmek istiyor musunuz?"
                                    class="btn-delete btn btn-sm btn-danger">
                                        Kaldır
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
