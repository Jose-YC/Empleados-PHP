<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idDocumentocontable') }}
            {{ Form::text('idDocumentocontable', $documentosContable->idDocumentocontable, ['class' => 'form-control' . ($errors->has('idDocumentocontable') ? ' is-invalid' : ''), 'placeholder' => 'Iddocumentocontable']) }}
            {!! $errors->first('idDocumentocontable', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dconnombre') }}
            {{ Form::text('dconnombre', $documentosContable->dconnombre, ['class' => 'form-control' . ($errors->has('dconnombre') ? ' is-invalid' : ''), 'placeholder' => 'Dconnombre']) }}
            {!! $errors->first('dconnombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dconfecha') }}
            {{ Form::text('dconfecha', $documentosContable->dconfecha, ['class' => 'form-control' . ($errors->has('dconfecha') ? ' is-invalid' : ''), 'placeholder' => 'Dconfecha']) }}
            {!! $errors->first('dconfecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dconhora') }}
            {{ Form::text('dconhora', $documentosContable->dconhora, ['class' => 'form-control' . ($errors->has('dconhora') ? ' is-invalid' : ''), 'placeholder' => 'Dconhora']) }}
            {!! $errors->first('dconhora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idOrdencompra') }}
            {{ Form::text('idOrdencompra', $documentosContable->idOrdencompra, ['class' => 'form-control' . ($errors->has('idOrdencompra') ? ' is-invalid' : ''), 'placeholder' => 'Idordencompra']) }}
            {!! $errors->first('idOrdencompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idEmpleado') }}
            {{ Form::text('idEmpleado', $documentosContable->idEmpleado, ['class' => 'form-control' . ($errors->has('idEmpleado') ? ' is-invalid' : ''), 'placeholder' => 'Idempleado']) }}
            {!! $errors->first('idEmpleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idTipopago') }}
            {{ Form::text('idTipopago', $documentosContable->idTipopago, ['class' => 'form-control' . ($errors->has('idTipopago') ? ' is-invalid' : ''), 'placeholder' => 'Idtipopago']) }}
            {!! $errors->first('idTipopago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idVenta') }}
            {{ Form::text('idVenta', $documentosContable->idVenta, ['class' => 'form-control' . ($errors->has('idVenta') ? ' is-invalid' : ''), 'placeholder' => 'Idventa']) }}
            {!! $errors->first('idVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('docdescripcion') }}
            {{ Form::text('docdescripcion', $documentosContable->docdescripcion, ['class' => 'form-control' . ($errors->has('docdescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Docdescripcion']) }}
            {!! $errors->first('docdescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>