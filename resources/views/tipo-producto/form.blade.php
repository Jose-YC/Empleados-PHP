<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idTipoproducto') }}
            {{ Form::text('idTipoproducto', $tipoProducto->idTipoproducto, ['class' => 'form-control' . ($errors->has('idTipoproducto') ? ' is-invalid' : ''), 'placeholder' => 'Idtipoproducto']) }}
            {!! $errors->first('idTipoproducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tpronombre') }}
            {{ Form::text('tpronombre', $tipoProducto->tpronombre, ['class' => 'form-control' . ($errors->has('tpronombre') ? ' is-invalid' : ''), 'placeholder' => 'Tpronombre']) }}
            {!! $errors->first('tpronombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>