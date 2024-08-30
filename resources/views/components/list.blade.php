@props(['links'])

@php
    $defaultLink = [
        'link' => '#',
        'nombre' => 'dashboard',
    ];

    $links = $links ?? [$defaultLink];
@endphp

<ul class="submenu">
    @foreach ($links as $link)
        @if (isset($link['active']) && isset($link['active1']))
            <x-link :link="$link['link']" :nombre="$link['nombre']" :active="$link['active']" :active1="$link['active1']" :clave="$link['clave']"
              :permiso="$link['permiso']"   :valor="$link['valor']"  />
        @elseif (isset($link['active']))
            <x-link :link="$link['link']" :nombre="$link['nombre']" :permiso="$link['permiso']" :active="$link['active']" />
        @else
                <x-link :link="$link['link']" :permiso="$link['permiso']" :nombre="$link['nombre']"  />
        @endif
    @endforeach
</ul>
