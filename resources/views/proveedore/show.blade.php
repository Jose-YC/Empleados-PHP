@extends('layouts.app')

@section('template_title')
    {{-- {{ $proveedore->name ?? "{{ __('Show') Proveedore" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proveedore</span>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Numero del proveedor:</strong>
                            {{ $proveedore->idProveedor }}
                        </div>
                        <div class="form-group">
                            <strong>Documento del proveedor:</strong>
                            {{ $proveedore->provdoc }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $proveedore->provtelefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $proveedore->provcorreo }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $proveedore->provdireccion }}
                        </div>
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $proveedore->provrazonsocial }}
                        </div>

                    </div>
                    <x-extras.regreso :url="'proveedores.index'"/>
                   
                </div>
            </div>
        </div>
    </section>
@endsection
