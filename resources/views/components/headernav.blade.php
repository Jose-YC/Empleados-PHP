@props(['headerlinks', 'icons' , 'links'])

@php
    $links = $links ?? "#";
@endphp

<a href="{{$links}}" class="sidebar-link">
    <i class="bi  {{ $icons }}"></i>
    <span>{{ $headerlinks }}</span>
</a>
