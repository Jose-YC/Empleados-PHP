@props(['url'])

@php
    $url = $url ?? "#";
@endphp

<div class="card-footer">
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route($url) }}"> regresar</a>
    </div>
</div>
