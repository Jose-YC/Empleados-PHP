@extends('layouts.app')
@section('main-title','Dashboard')
@section('content')
<link rel="stylesheet" href="assets/extensions/choices.js/public/assets/styles/choices.css">


<h1>
    Bienvenido {{ Auth::user()->usunombre }}
</h1>
nos falta lo que es
orden de compra
solicitudes -> editarlas

capacitacion

@endsection



@section('js')
<script src="assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/static/js/pages/datatables.js"></script>
@endsection
