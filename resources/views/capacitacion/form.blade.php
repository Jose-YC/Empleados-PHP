<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Capacitador') }}
            {{ Form::text('capcapacitador', $capacitacion->capcapacitador, ['class' => 'form-control' . ($errors->has('capcapacitador') ? ' is-invalid' : ''), 'placeholder' => 'Capacitador']) }}
            {!! $errors->first('capcapacitador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha Inicio') }}
            {{ Form::date('capfechainicio', $capacitacion->capfechainicio, ['class' => 'form-control' . ($errors->has('capfechainicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('capfechainicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capfechafin') }}
            {{ Form::date('capfechafin', $capacitacion->capfechafin, ['class' => 'form-control' . ($errors->has('capfechafin') ? ' is-invalid' : ''), 'placeholder' => 'Capfechafin']) }}
            {!! $errors->first('capfechafin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- area de la capacitacion  o empleados de la capacitacion   --}}
        <div class="form-group">
            {{ Form::label('caparea') }}
            {{ Form::select('caparea', $area, null, ['class' => 'form-control' . ($errors->has('capfechafin') ? ' is-invalid' : ''), 'placeholder' => 'seleccione area']) }}
            {!! $errors->first('caparea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            @if (isset($capacitacion->solicitud->soldescripcion))
                {{ Form::label('capdescripcion', 'Descripcion') }}
                {{ Form::text('capdescripcion', $capacitacion->solicitud->first()->soldescripcion, ['class' => 'form-control' . ($errors->has('capdescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                {!! $errors->first('capdescripcion', '<div class="invalid-feedback">:message</div>') !!}
            @else
                {{ Form::label('capdescripcion', 'Descripcion') }}
                {{ Form::text('capdescripcion', null, ['class' => 'form-control' . ($errors->has('capdescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                {!! $errors->first('capdescripcion', '<div class="invalid-feedback">:message</div>') !!}
            @endif
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
