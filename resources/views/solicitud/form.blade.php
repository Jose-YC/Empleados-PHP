<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('solnombre','Nombre') }}
            {{ Form::text('solnombre', $solicitud->solnombre, ['class' => 'form-control' . ($errors->has('solnombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('solnombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('soldescripcion','Descripcion') }}
            {{ Form::text('soldescripcion', $solicitud->soldescripcion, ['class' => 'form-control' . ($errors->has('soldescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('soldescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('solcantidad','Cantidad') }}
            {{ Form::text('solcantidad', $solicitud->solcantidad, ['class' => 'form-control' . ($errors->has('solcantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('solcantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('solestado','Estado') }}
            {!! Form::select('solestado', ['aprobado'=>'aprobado', 'observado'=>'observado', 'pendiente'=>'pendiente','entregado'=>'entregado','proceso'=>'proceso'], $solicitud->solestado,  ['class' => 'form-control' . ($errors->has('solcantidad') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar']) !!}

            {!! $errors->first('solestado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('solobservacion','Observaciones') }}
            {{ Form::text('solobservacion', $solicitud->solobservacion, ['class' => 'form-control' . ($errors->has('solcantidad') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('solobservacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{-- SI EXISTE EL ARCHIVO RETORNAMELO PERO SI NO RETORNA UN HOLA  --}}
            @if (isset($solicitud->solarchivo))
              <iframe src="{{Storage::url($solicitud->solarchivo)}}" frameborder="0"></iframe>
            @else
            {{ Form::label('solarchivo','Archivo') }}
            {{ Form::file('solarchivo', $solicitud->solarchivo, ['class' => 'form-control' . ($errors->has('solarchivo') ? ' is-invalid' : ''), 'placeholder' => 'Archivo']) }}
            {!! $errors->first('solarchivo', '<div class="invalid-feedback">:message</div>') !!}
            @endif

        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
