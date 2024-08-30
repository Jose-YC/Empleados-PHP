@extends('layouts.app')

@section('template_title')
    Solicitud
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Solicitud') }}
                            </span>
                            <div class="float-right">
                                @can('solicituds.create')
                                    <a href="{{ route('solicituds.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Nombre</th>
                                        <th>Archivo</th>
                                        <th>Observacion</th>
                                        <th>Estado</th>
                                        <th>Empleado</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicituds as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->idSolicitud }}</td>
                                        <td>{{ $solicitud->solnombre }}</td>
                                        <td><a href="{{ Storage::url($solicitud->solarchivo) }}"
                                                download="descargar.pdf"><i class="fas fa-cloud-download-alt"></i></a></td>
                                        <td>@if ($solicitud->solobservacion != null){{ $solicitud->solobservacion }}@else----@endif</td>
                                        <td>{{ $solicitud->solestado }}</td>
                                        <td>{{ $solicitud->Empleado->User->usunombre }}</td>
                                        <td>
                                            <form action="{{ route('solicituds.destroy', $solicitud) }}"
                                                method="POST">
                                                <div class="btn-group-vertical" role="group"
                                                    aria-label="Vertical button group">
                                                    @can('solicituds.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('solicituds.show', $solicitud) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('solicituds.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('solicituds.edit', $solicitud) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('solicituds.destroy')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endcan

                                                </div>
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

        let jquery_datatable = $("#tabla1").DataTable({
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
