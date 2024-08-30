@extends('layouts.app')

@section('template_title')
    {{-- {{ $estadosFinanciero->name ?? "{{ __('Show') Estados Financiero" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estados Financiero</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estados-financieros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idestadofinanciero:</strong>
                            {{ $estadosFinanciero->idEstadofinanciero }}
                        </div>
                        <div class="form-group">
                            <strong>Esfitipo:</strong>
                            {{ $estadosFinanciero->esfitipo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
