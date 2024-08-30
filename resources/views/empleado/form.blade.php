

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">

            <div class="form-group col-md-6">
                {{ Form::label('empnombres','Nombre del Empleado') }}
                {{ Form::text('empnombres', $empleado->empnombres, ['class' => 'form-control' . ($errors->has('empnombres') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Nombre del Empleado']) }}
                {!! $errors->first('empnombres', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('empnombres','Apellido Paterno') }}
                {{ Form::text('empapellidop', $empleado->empapellidop, ['class' => 'form-control' . ($errors->has('empapellidop') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Apellido Paterno']) }}
                {!! $errors->first('empapellidop', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('empapellidom','Apellido Materno') }}
                {{ Form::text('empapellidom', $empleado->empapellidom, ['class' => 'form-control' . ($errors->has('empapellidom') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Apellido Materno']) }}
                {!! $errors->first('empapellidom', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('empdni','DNI') }}
                {{ Form::text('empdni', $empleado->empdni, ['class' => 'form-control' . ($errors->has('empdni') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese DNI']) }}
                {!! $errors->first('empdni', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('empdireccion','Direccion') }}
                {{ Form::text('empdireccion', $empleado->empdireccion, ['class' => 'form-control' . ($errors->has('empdireccion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Direccion']) }}
                {!! $errors->first('empdireccion', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('emptelefono','Telefono') }}
                {{ Form::text('emptelefono', $empleado->emptelefono, ['class' => 'form-control' . ($errors->has('emptelefono') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Telefono']) }}
                {!! $errors->first('emptelefono', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('idDepartamento','Departamentos') }}
                {!! Form::select('idDepartamento', $departamentos, $empleado->idDepartamento,['class' => 'form-control' . ($errors->has('idDepartamento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Departamento']) !!}

            {!! $errors->first('idDepartamento', '<div class="invalid-feedback">:message</div>') !!}

            </div>

            <div class="clearfix"></div>

        @if ($user->usunombre)
        <div class="form-group col-md-6">
            {{ Form::label('usunombre','Nombre de usuario') }}
            {{ Form::text('usunombre', $user->usunombre, ['class' => 'form-control' . ($errors->has('usunombre') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Nombre de usuario']) }}
            {!! $errors->first('usunombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @endif

            <div class="form-group col-md-6">
                {{ Form::label('Correo') }}
                {{ Form::text('usuemail', $user->usuemail, ['class' => 'form-control' . ($errors->has('usuemail') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Correo']) }}
                {!! $errors->first('usuemail', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('Contraseña') }}
                {{ Form::text('usucontra', $user->usucontra, ['class' => 'form-control' . ($errors->has('usucontra') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Contraseña']) }}
                {!! $errors->first('usucontra', '<div class="invalid-feedback">:message</div>') !!}
            </div>


            <div class="col-12 ">
                <div class="row">
                    {{ Form::label('Roles') }}
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        @foreach ($roles as $rol)
                            <li class="nav-item">

                              <label class="nav-link">
                                <div>
                                    <input type="checkbox" name="rols[]" value="{{ $rol->id }}" id="rol_{{ $rol->id }}" {{ $user->roles->contains($rol->id) ? 'checked' : ''}} >
                                    <label for="rol_{{ $rol->id }}">{{ $rol->name }}</label>
                                </div>
                            </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <div class="box-footer mt-4 text-center">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
