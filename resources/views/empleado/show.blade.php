@extends('layouts.app')

@section('template_title')
    {{-- {{ $empleado->name ?? "{{ __('Show') Empleado" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Idempleado:</strong>
                            {{ $empleado->idEmpleado }}
                        </div>
                        <div class="form-group">
                            <strong>Empnombres:</strong>
                            {{ $empleado->empnombres }}
                        </div>
                        <div class="form-group">
                            <strong>Empapellidop:</strong>
                            {{ $empleado->empapellidop }}
                        </div>
                        <div class="form-group">
                            <strong>Empapellidom:</strong>
                            {{ $empleado->empapellidom }}
                        </div>
                        <div class="form-group">
                            <strong>Empdni:</strong>
                            {{ $empleado->empdni }}
                        </div>
                        <div class="form-group">
                            <strong>Empdireccion:</strong>
                            {{ $empleado->empdireccion }}
                        </div>
                        <div class="form-group">
                            <strong>Emptelefono:</strong>
                            {{ $empleado->emptelefono }}
                        </div>
                        <div class="form-group">
                            <strong>Iddepartamento:</strong>
                            {{ $empleado->idDepartamento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
