@props(['titulo', 'especifico'])

@php
    $titulo = $titulo ?? 'Titulo';
    $especifico = $especifico ?? 'Especifico';
@endphp



@section('title')
{{ $titulo }}
@endsection


@section('title-page')
 {{ $especifico}}
@endsection



