@extends('layouts.app')

@section('template_title')
    {{-- {{ $departamento->name ?? "{{ __('Show') Departamento" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Departamento</span>
                        </div>
                       
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Numero de departamento:</strong>
                            {{ $departamento->idDepartamento }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $departamento->depnombre }}
                        </div>

                    </div>
                    <x-extras.regreso :url="'departamentos.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
