@extends('layouts.app')

@section('template_title')
    {{-- {{ $unidadmedida->name ?? "{{ __('Show') Unidadmedida" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Unidadmedida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('unidadmedidas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idunidadmedida:</strong>
                            {{ $unidadmedida->idUnidadmedida }}
                        </div>
                        <div class="form-group">
                            <strong>Umednombre:</strong>
                            {{ $unidadmedida->umednombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
