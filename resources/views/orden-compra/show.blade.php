@extends('layouts.app')

@section('template_title')
    {{-- {{ $ordenCompra->name ?? "{{ __('Show') Orden Compra" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Orden Compra</span>
                        </div>
                       
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nro de Documento:</strong>
                            {{ $ordenCompra->idOrdencompra }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha y Hora:</strong>
                            {{ $ordenCompra->orcomfecha }} - {{ $ordenCompra->orcomhora }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                           @if ($ordenCompra->orcomdescripcion){{ $ordenCompra->orcomdescripcion }}@else No hay descripcion @endif
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            S/.{{ $ordenCompra->orcomtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $ordenCompra->orcomestado }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedor:</strong>
                            {{ $ordenCompra->Proveedore->provrazonsocial }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $ordenCompra->Empleado->User->usunombre }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong><br>
                            <iframe src="{{ Storage::url($ordenCompra->docontable->dconurl) }}" style="width:80%; height:700px;" frameborder="0" download=false ></iframe>
                        </div>

                    </div>

                    <x-extras.regreso :url="'orden-compras.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
