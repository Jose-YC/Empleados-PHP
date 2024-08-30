@extends('layouts.app')

@section('template_title')
    {{-- {{ $venta->name ?? "{{ __('Show') Venta" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Venta</span>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Numero de la venta:</strong>
                            {{ $venta->idVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha y hora :</strong>
                            {{ $venta->venfecha }} {{ $venta->venhora }}
                        </div>
                        <div class="form-group">
                            <strong>Documento del cliente:</strong>
                            {{ $venta->vendocumentocliente }}
                        </div>

                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $venta->venestado }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $venta->venmonto }}
                        </div>
                        <div class="form-group">
                            <strong>Inpuesto:</strong>
                            {{ $venta->venimpuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Total neto:</strong>
                            {{ $venta->ventotalneto }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                          @if ($venta->venobservacion != null){{ $venta->venobservacion }} @else -- @endif
                        </div>
                        <div class="form-group">
                            <strong>Tipo de comprobante:</strong>
                            {{ $venta->idTipocomprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de pago:</strong>
                            {{ $venta->idTipopago }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $venta->idEmpleado }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong><br>
                            <iframe src="{{ Storage::url($venta->docontable->dconurl) }}" style="width:80%; height:700px;" frameborder="0" download=false ></iframe>
                        </div>
                    </div>
                    <x-extras.regreso :url="'ventas.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
