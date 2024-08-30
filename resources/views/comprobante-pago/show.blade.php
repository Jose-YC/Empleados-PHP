@extends('layouts.app')

@section('template_title')
    {{-- {{ $comprobantePago->name ?? "{{ __('Show') Comprobante Pago" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Comprobante Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comprobante-pagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idcomprobante:</strong>
                            {{ $comprobantePago->idComprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Cpagofeha:</strong>
                            {{ $comprobantePago->cpagofeha }}
                        </div>
                        <div class="form-group">
                            <strong>Cpagohora:</strong>
                            {{ $comprobantePago->cpagohora }}
                        </div>
                        <div class="form-group">
                            <strong>Cpagototal:</strong>
                            {{ $comprobantePago->cpagototal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
