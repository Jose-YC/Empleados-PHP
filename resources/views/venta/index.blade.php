@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Venta') }}
                            </span>

                            <div class="float-right">
                                @can('ventas.create')
                                    <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Fecha y Hora</th>
                                        <th>Documento cliente</th>
                                        <th>Estado</th>
                                        <th>Total </th>
                                        <th>Observaciones</th>
                                        <th>Tipo Comprobante</th>
                                        <th>Tipo Pago</th>
                                        <th>Empleado</th>
                                        <th>Documento</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>

                                            <td>{{ $venta->idVenta }}</td>
                                            <td>{{ $venta->venfecha }} {{ $venta->venhora }}</td>
                                            <td>{{ $venta->vendocumentocliente }}</td>
                                            <td>{{ $venta->venestado }}</td>
                                            <td>{{ $venta->ventotalneto }}</td>


                                            <td>
                                                @if ($venta->venobservacion)
                                                    {{ $venta->venobservacion }}
                                                @else
                                                    -----
                                                @endif
                                            </td>
                                            <td>{{ $venta->TipoComprobanteVenta->tcomcomprobante }}</td>
                                            <td>{{ $venta->TipoPago->tpagotipo }}</td>
                                            <td>
                                                <a href="{{ Storage::url($venta->docontable->dconurl) }}"
                                                    download="Venta{{ $venta->idVenta }}.pdf"><i
                                                        class="fas fa-cloud-download-alt"></i></a>

                                            </td>
                                            <td>{{ $venta->idEmpleado }}</td>

                                            <td>
                                                <form action="{{ route('ventas.destroy', $venta) }}" method="POST">
                                                    @can('ventas.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ventas.show', $venta) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('ventas.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventas.edit', $venta) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('ventas.delete')
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
