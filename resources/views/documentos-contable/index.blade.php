@extends('layouts.app')

@section('template_title')
    Documentos Contable
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Documentos Contable') }}
                            </span>
                            @can('documentos-contables.create')
                                <div class="float-right">
                            <a href="{{ route('documentos-contables.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Create New') }}
                            </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover"id="tabla1">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>


                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Tipo Documento</th>
                                        <th>Monto</th>

                                        <th>Empleado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentosContables as $documentosContable)
                                        <tr>

                                            <td>{{ $documentosContable->idDocumentocontable }}</td>
                                            <td>{{ $documentosContable->dconnombre }}</td>
                                            <td>{{ $documentosContable->dconfecha }}</td>
                                            <td>{{ $documentosContable->dconhora }}</td>
                                            <td>{{ class_basename($documentosContable->docontable_type) }}</td>
                                            <td>
                                                @if ($documentosContable->docontable->ventotalneto)
                                                    S/.{{ $documentosContable->docontable->ventotalneto }}
                                                @else
                                                    S/.{{ $documentosContable->docontable->orcomtotal }}
                                                @endif
                                            </td>
                                            <td>{{ $documentosContable->Empleado->User->usunombre }}
                                               </td>
                                            <td>
                                                <form
                                                    action="{{ route('documentos-contables.destroy', $documentosContable) }}"
                                                    method="POST">
                                                    @can('documentos-contables.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('documentos-contables.show', $documentosContable) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('documentos-contables.edit')
                                                        {{-- <a class="btn btn-sm btn-success" href="{{ route('documentos-contables.edit',$documentosContable ) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a> --}}
                                                    @endcan
                                                    @can('documentos-contables.destroy')
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button> --}}
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
