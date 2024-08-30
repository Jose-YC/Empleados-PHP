<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('pronombre','Nombre del producto') }}
            {{ Form::text('pronombre', $producto->pronombre, ['class' => 'form-control' . ($errors->has('pronombre') ? ' is-invalid' : ''), 'placeholder' => 'Pronombre']) }}
            {!! $errors->first('pronombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prodescripcion','Descripcion del producto') }}
            {{ Form::text('prodescripcion', $producto->prodescripcion, ['class' => 'form-control' . ($errors->has('prodescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Prodescripcion']) }}
            {!! $errors->first('prodescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('propreciounitario','Precio para venta') }}
            {{ Form::text('propreciounitario', $producto->propreciounitario, ['class' => 'form-control' . ($errors->has('propreciounitario') ? ' is-invalid' : ''), 'placeholder' => 'Propreciounitario']) }}
            {!! $errors->first('propreciounitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('propreciocompra','Precio de compra') }}
            {{ Form::text('propreciocompra', $producto->propreciocompra, ['class' => 'form-control' . ($errors->has('propreciocompra') ? ' is-invalid' : ''), 'placeholder' => 'propreciocompra']) }}
            {!! $errors->first('propreciocompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prostock','Stock actual') }}
            {{ Form::text('prostock', $producto->prostock, ['class' => 'form-control' . ($errors->has('prostock') ? ' is-invalid' : ''), 'placeholder' => 'Prostock']) }}
            {!! $errors->first('prostock', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prostockminimo','Stock minimo') }}
            {{ Form::text('prostockminimo', $producto->prostockminimo, ['class' => 'form-control' . ($errors->has('prostockminimo') ? ' is-invalid' : ''), 'placeholder' => 'Prostockminimo']) }}
            {!! $errors->first('prostockminimo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idTipoproducto','Tipo de producto') }}
            {{ Form::select('idTipoproducto', $tipoProducto, $producto->idTipoproducto, ['class' => 'form-control' . ($errors->has('idTipoproducto') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un producto']) }}
            {!! $errors->first('idTipoproducto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idUnidadmedida','Unidad de Medida') }}

            {!! Form::select('idUnidadmedida', $tipoUnidad, $producto->idUnidadmedida, ['class' => 'form-control' . ($errors->has('idUnidadmedida') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un producto']) !!}
            {!! $errors->first('idUnidadmedida', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
