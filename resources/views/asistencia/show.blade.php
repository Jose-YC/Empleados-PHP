@extends('layouts.app')

@section('template_title')
    {{-- {{ $asistencia->name ?? "{{ __('Show') Asistencia" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Asistencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idasistencia:</strong>
                            {{ $asistencia->idAsistencia }}
                        </div>
                        <div class="form-group">
                            <strong>Idempleado:</strong>
                            {{ $asistencia->idEmpleado }}
                        </div>
                        <div class="form-group">
                            <strong>Idcapacitacion:</strong>
                            {{ $asistencia->idCapacitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Iddepartamento:</strong>
                            {{ $asistencia->idDepartamento }}
                        </div>
                        <div class="form-group">
                            <strong>Asistio:</strong>
                            {{ $asistencia->asistio }}
                        </div>
                        <div class="form-group">
                            <strong>Justificacion:</strong>
                            {{ $asistencia->justificacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
