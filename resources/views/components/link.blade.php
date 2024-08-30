<!--
    estructura del componente
    <li><a href="posts.html">All Posts</a></li>
-->


@props(['link', 'nombre', 'active', 'active1', 'clave', 'valor', 'permiso'])

@php

    $active = $active ?? false;
    $active1 = $active1 ?? false;
    $clave = $clave ?? 'id';
    $valor = $valor ?? 1;
    $permiso = $permiso ?? false;

@endphp

<li class="submenu-item">

    @if ($permiso)
        @can($permiso)
            @if ($active && $active1)
                <a href="{{ route($link, [$clave => $valor]) }}">{{ $nombre }}</a>
            @elseif($active)
                <a href="{{ route($link) }}">{{ $nombre }}</a>
            @else
                <a href="{{ $link }}">{{ $nombre }}</a>
            @endif
        @endcan
    {{-- @else
        @if ($active && $active1)
            <a href="{{ route($link, [$clave => $valor]) }}">{{ $nombre }}</a>
        @elseif($active)
            <a href="{{ route($link) }}">{{ $nombre }}</a>
        @else
            <a href="{{ $link }}">{{ $nombre }}</a>
        @endif --}}
    @endif



    {{-- @if ($active && $active1)
        <a href="{{route($link,[$clave => $valor])}}">{{ $nombre }}</a>
    @elseif($active)
        <a href="{{route($link)}}">{{ $nombre }}</a>
    @else
        <a href="{{ $link }}">{{ $nombre }}</a>
    @endif --}}

</li>


{{-- @can()

@endcan --}}
