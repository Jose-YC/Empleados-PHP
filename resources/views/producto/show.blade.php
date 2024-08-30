@extends('layouts.app')

{{-- 
<x-extras.encabezado :titulo="'Producto'" :especifico="'{!!$producto->pronombre!!}'"/> --}}

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  ">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto</span>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>N° de Producot:</strong>
                            {{ $producto->idProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->pronombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->prodescripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio para venta:</strong>
                            {{ $producto->propreciounitario }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $producto->prostock }}
                        </div>
                        <div class="form-group">
                            <strong>Stock minimo:</strong>
                            {{ $producto->prostockminimo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo del producto:</strong>
                            {{ $producto->TipoProducto->tpronombre }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad de medida:</strong>
                            {{ $producto->Unidadmedida->umednombre }}
                        </div>

                    </div>

                    <x-extras.regreso :url="'productos.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
