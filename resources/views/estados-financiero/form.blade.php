<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idEstadofinanciero') }}
            {{ Form::text('idEstadofinanciero', $estadosFinanciero->idEstadofinanciero, ['class' => 'form-control' . ($errors->has('idEstadofinanciero') ? ' is-invalid' : ''), 'placeholder' => 'Idestadofinanciero']) }}
            {!! $errors->first('idEstadofinanciero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('esfitipo') }}
            {{ Form::text('esfitipo', $estadosFinanciero->esfitipo, ['class' => 'form-control' . ($errors->has('esfitipo') ? ' is-invalid' : ''), 'placeholder' => 'Esfitipo']) }}
            {!! $errors->first('esfitipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>