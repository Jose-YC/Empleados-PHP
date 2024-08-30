@extends('layouts.app')

@section('template_title')
    {{-- {{ $solicitud->name ?? "{{ __('Show') Solicitud" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Solicitud</span>
                        </div>
                       
                    </div>

                    <div class="card-body">


                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $solicitud->solnombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $solicitud->soldescripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Observación:</strong>
                           @if ($solicitud->solobservacion == null) No hay observaciones @else{{ $solicitud->solobservacion }}@endif
                        </div>
                        <div class="form-group">
                            <strong>Estado de la solicitud:</strong>
                            {{ $solicitud->solestado }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado solicitante:</strong>
                            {{ $solicitud->Empleado->User->usunombre }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento de la solicitud:</strong>
                            {{ $solicitud->Departamento->depnombre }}
                        </div>
                        <div class="form-group">
                            <strong>Documento de la Solicitud:</strong> <br>
                            <iframe src="{{Storage::url($solicitud->solarchivo)}}" style="width:80%; height:700px;" frameborder="0" download=false ></iframe>
                        </div>



                        <x-extras.regreso :url="'solicituds.index'"/>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
