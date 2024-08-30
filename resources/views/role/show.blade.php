@extends('layouts.app')

@section('template_title')
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuario</span>
                        </div>
                       
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre del rol:</strong>
                            {{ $role->name }}
                        </div>

                        <div class="form-group">
                            <strong>Lista de Permisos:</strong>

                            @foreach ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </div>


                    </div>
                    <x-extras.regreso :url="'roles.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
