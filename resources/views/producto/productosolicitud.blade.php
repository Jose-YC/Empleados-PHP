@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Solicitud
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Solicitud</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('solicituds.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('pronombre','Producto Solicitado : ' . $prod->pronombre) }}
                                        {{ Form::hidden('prod', $prod->idProducto) }}
                                        {{ Form::hidden('tipo', ' ') }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('solnombre','Nombre') }}
                                        {{ Form::text('solnombre', $solicitud->solnombre, ['class' => 'form-control' . ($errors->has('solnombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                        {!! $errors->first('solnombre', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('soldescripcion','Descripcion') }}
                                        {{ Form::text('soldescripcion', $solicitud->soldescripcion, ['class' => 'form-control' . ($errors->has('soldescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('soldescripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('solcantidad','Cantidad') }}
                                        {{ Form::text('solcantidad', $solicitud->solcantidad, ['class' => 'form-control' . ($errors->has('solcantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                        {!! $errors->first('solcantidad', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
