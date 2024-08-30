@extends('layouts.app')

@section('template_title')
    {{-- {{ $tipoComprobanteVenta->name ?? "{{ __('Show') Tipo Comprobante Venta" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Comprobante  </span>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Numero :</strong>
                            {{ $tipoComprobanteVenta->idTipocomprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de comprobante:</strong>
                            {{ $tipoComprobanteVenta->tcomcomprobante }}
                        </div>

                    </div>
                    <x-extras.regreso :url="'tipo-comprobante-ventas.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
