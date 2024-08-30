@extends('layouts.app')

@section('template_title')
    {{-- {{ $documentosContable->name ?? "{{ __('Show') Documentos Contable" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Documentos Contable</span>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Numero:</strong>
                            {{ $documentosContable->idDocumentocontable }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $documentosContable->dconnombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $documentosContable->dconfecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $documentosContable->dconhora }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $documentosContable->docontable->Empleado->User->usunombre }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Documento:</strong>
                            {{ class_basename($documentosContable->docontable_type) }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            @if ($documentosContable->docontable->ventotalneto)
                            S/.{{ $documentosContable->docontable->ventotalneto }}
                        @else
                            S/.{{ $documentosContable->docontable->orcomtotal }}
                        @endif
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            <br>

                            <iframe src="{{Storage::url($documentosContable->dconurl)}}" style="width:80%; height:700px;" frameborder="0" download=false ></iframe>

                        </div>

                    </div>
                    <x-extras.regreso :url="'documentos-contables.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
