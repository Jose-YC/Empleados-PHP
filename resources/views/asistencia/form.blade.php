<div class="box box-info padding-1">
    <div class="box-body">

        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Empleado</th>
                        <th scope="col">Asistio </th>
                        <th scope="col">Justificar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asistencia as $item)
                        <tr class="">
                            <td scope="row">{{ $item->idEmpleado }}</td>
                            <td>
                           
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="asistio[{{ $item->idAsistencia }}]" id="inlineRadio1" value="si"
                                        {{ $item->asistio === 'si' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio1">si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="asistio[{{ $item->idAsistencia }}]" id="inlineRadio2" value="no"
                                        {{ $item->asistio === 'no' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineRadio2">no</label>
                                </div>
                            </td>
                            <td>


                                <input type="text" name="justificante[{{ $item->idAsistencia }}]" value="{{ $item->justificacion }}" class="form-control {{ $errors->has('asistio') ? ' is-invalid' : '' }}  ">

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>









        {{--

        <div class="form-group">
            {{ Form::label('idAsistencia') }}
            {{ Form::text('idAsistencia', $asistencia->idAsistencia, ['class' => 'form-control' . ($errors->has('idAsistencia') ? ' is-invalid' : ''), 'placeholder' => 'Idasistencia']) }}
            {!! $errors->first('idAsistencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idEmpleado') }}
            {{ Form::text('idEmpleado', $asistencia->idEmpleado, ['class' => 'form-control' . ($errors->has('idEmpleado') ? ' is-invalid' : ''), 'placeholder' => 'Idempleado']) }}
            {!! $errors->first('idEmpleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idCapacitacion') }}
            {{ Form::text('idCapacitacion', $asistencia->idCapacitacion, ['class' => 'form-control' . ($errors->has('idCapacitacion') ? ' is-invalid' : ''), 'placeholder' => 'Idcapacitacion']) }}
            {!! $errors->first('idCapacitacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idDepartamento') }}
            {{ Form::text('idDepartamento', $asistencia->idDepartamento, ['class' => 'form-control' . ($errors->has('idDepartamento') ? ' is-invalid' : ''), 'placeholder' => 'Iddepartamento']) }}
            {!! $errors->first('idDepartamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('asistio') }}
            {{ Form::text('asistio', $asistencia->asistio, ['class' => 'form-control' . ($errors->has('asistio') ? ' is-invalid' : ''), 'placeholder' => 'Asistio']) }}
            {!! $errors->first('asistio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('justificacion') }}
            {{ Form::text('justificacion', $asistencia->justificacion, ['class' => 'form-control' . ($errors->has('justificacion') ? ' is-invalid' : ''), 'placeholder' => 'Justificacion']) }}
            {!! $errors->first('justificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
