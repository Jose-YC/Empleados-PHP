@extends('layouts.app')

@section('template_title')
    {{-- {{ $tipoPago->name ?? "{{ __('Show') Tipo Pago" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Pago</span>
                        </div>
                         
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $tipoPago->idTipopago }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de pago:</strong>
                            {{ $tipoPago->tpagotipo }}
                        </div>

                    </div>
                    <x-extras.regreso :url="'tipo-pagos.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
