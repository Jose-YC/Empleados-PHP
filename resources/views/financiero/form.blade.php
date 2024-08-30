<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idFinanciero') }}
            {{ Form::text('idFinanciero', $financiero->idFinanciero, ['class' => 'form-control' . ($errors->has('idFinanciero') ? ' is-invalid' : ''), 'placeholder' => 'Idfinanciero']) }}
            {!! $errors->first('idFinanciero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('finanio') }}
            {{ Form::text('finanio', $financiero->finanio, ['class' => 'form-control' . ($errors->has('finanio') ? ' is-invalid' : ''), 'placeholder' => 'Finanio']) }}
            {!! $errors->first('finanio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fintipo') }}
            {{ Form::text('fintipo', $financiero->fintipo, ['class' => 'form-control' . ($errors->has('fintipo') ? ' is-invalid' : ''), 'placeholder' => 'Fintipo']) }}
            {!! $errors->first('fintipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idcomprobante') }}
            {{ Form::text('idcomprobante', $financiero->idcomprobante, ['class' => 'form-control' . ($errors->has('idcomprobante') ? ' is-invalid' : ''), 'placeholder' => 'Idcomprobante']) }}
            {!! $errors->first('idcomprobante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idEstadofinanciero') }}
            {{ Form::text('idEstadofinanciero', $financiero->idEstadofinanciero, ['class' => 'form-control' . ($errors->has('idEstadofinanciero') ? ' is-invalid' : ''), 'placeholder' => 'Idestadofinanciero']) }}
            {!! $errors->first('idEstadofinanciero', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>