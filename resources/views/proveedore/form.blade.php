<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('provdoc','Documento') }}
            {{ Form::text('provdoc', $proveedore->provdoc, ['class' => 'form-control' . ($errors->has('provdoc') ? ' is-invalid' : ''), 'placeholder' => 'Provdoc']) }}
            {!! $errors->first('provdoc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provtelefono','Telefono') }}
            {{ Form::text('provtelefono', $proveedore->provtelefono, ['class' => 'form-control' . ($errors->has('provtelefono') ? ' is-invalid' : ''), 'placeholder' => 'Provtelefono']) }}
            {!! $errors->first('provtelefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provcorreo','Correo') }}
            {{ Form::text('provcorreo', $proveedore->provcorreo, ['class' => 'form-control' . ($errors->has('provcorreo') ? ' is-invalid' : ''), 'placeholder' => 'Provcorreo']) }}
            {!! $errors->first('provcorreo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provdireccion','Direccion') }}
            {{ Form::text('provdireccion', $proveedore->provdireccion, ['class' => 'form-control' . ($errors->has('provdireccion') ? ' is-invalid' : ''), 'placeholder' => 'Provdireccion']) }}
            {!! $errors->first('provdireccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provrazonsocial','Razon Social') }}
            {{ Form::text('provrazonsocial', $proveedore->provrazonsocial, ['class' => 'form-control' . ($errors->has('provrazonsocial') ? ' is-invalid' : ''), 'placeholder' => 'Provrazonsocial']) }}
            {!! $errors->first('provrazonsocial', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
