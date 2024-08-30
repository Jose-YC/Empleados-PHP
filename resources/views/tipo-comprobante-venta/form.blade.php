<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('tcomcomprobante','Tipo de Comprobante') }}
            {{ Form::text('tcomcomprobante', $tipoComprobanteVenta->tcomcomprobante, ['class' => 'form-control' . ($errors->has('tcomcomprobante') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de comprobante']) }}
            {!! $errors->first('tcomcomprobante', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
