@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado') }}
                            </span>

                            <div class="float-right">
                                @can('empleados.create')
                                    <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tabla1">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>

                                        <th>Empleado</th>
                                        <th>DNI</th>
                                        <th>Correo</th>
                                        <th>Departamento</th>
                                        <th>Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                    <tr>

                                        <td>{{ $empleado->idEmpleado }}</td>

                                        <td>@if($empleado->User){{ $empleado->User->usunombre }}@endif</td>
                                        <td>{{ $empleado->empdni }}</td>
                                        <td> @if($empleado->User){{ $empleado->User->usuemail }}@endif</td>

                                        <td>{{ $empleado->Departamento->depnombre }}</td>
                                        <td>@if($empleado->User)
                                              @foreach ($empleado->user->roles as $rol)
                                                <li>{{ $rol->name }}</li>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST">
                                                @can('empleados.show')
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('empleados.show', $empleado) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                @endcan
                                                @can('empleados.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('empleados.edit', $empleado) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @endcan
                                                @can('empleados.destroy')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
@endsection

@push('componetsjs')
    <script>
        let jquery_datatable = $("#table1").DataTable({
            responsive: true
        })


        const setTableColor = () => {
            document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
                dt.classList.add('pagination-primary')
            })
        }
        setTableColor()
        jquery_datatable.on('draw', setTableColor)
    </script>
@endpush
