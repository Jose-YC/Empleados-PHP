<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idComprobante') }}
            {{ Form::text('idComprobante', $comprobantePago->idComprobante, ['class' => 'form-control' . ($errors->has('idComprobante') ? ' is-invalid' : ''), 'placeholder' => 'Idcomprobante']) }}
            {!! $errors->first('idComprobante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cpagofeha') }}
            {{ Form::text('cpagofeha', $comprobantePago->cpagofeha, ['class' => 'form-control' . ($errors->has('cpagofeha') ? ' is-invalid' : ''), 'placeholder' => 'Cpagofeha']) }}
            {!! $errors->first('cpagofeha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cpagohora') }}
            {{ Form::text('cpagohora', $comprobantePago->cpagohora, ['class' => 'form-control' . ($errors->has('cpagohora') ? ' is-invalid' : ''), 'placeholder' => 'Cpagohora']) }}
            {!! $errors->first('cpagohora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cpagototal') }}
            {{ Form::text('cpagototal', $comprobantePago->cpagototal, ['class' => 'form-control' . ($errors->has('cpagototal') ? ' is-invalid' : ''), 'placeholder' => 'Cpagototal']) }}
            {!! $errors->first('cpagototal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>