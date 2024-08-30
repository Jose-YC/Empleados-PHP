<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('depnombre','Departamento') }}
            {{ Form::text('depnombre', $departamento->depnombre, ['class' => 'form-control' . ($errors->has('depnombre') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
            {!! $errors->first('depnombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
