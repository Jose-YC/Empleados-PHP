@extends('layouts.app')

@section('template_title')
    {{-- {{ $financiero->name ?? "{{ __('Show') Financiero" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Financiero</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('financieros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idfinanciero:</strong>
                            {{ $financiero->idFinanciero }}
                        </div>
                        <div class="form-group">
                            <strong>Finanio:</strong>
                            {{ $financiero->finanio }}
                        </div>
                        <div class="form-group">
                            <strong>Fintipo:</strong>
                            {{ $financiero->fintipo }}
                        </div>
                        <div class="form-group">
                            <strong>Idcomprobante:</strong>
                            {{ $financiero->idcomprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Idestadofinanciero:</strong>
                            {{ $financiero->idEstadofinanciero }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
