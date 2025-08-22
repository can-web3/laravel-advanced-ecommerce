<div class="d-flex flex-wrap gap-3 align-items-center justify-content-between mb-3">
    <h1 class="h5 mb-0">{{ $title }}</h1>

    @if (!empty($plus) && $plus === true)
        <a href="{{ url()->current().'/ekle' }}" class="btn btn-success">Ekle</a>
    @endif
</div>
