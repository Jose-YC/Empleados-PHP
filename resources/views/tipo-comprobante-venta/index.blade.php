@extends('layouts.app')

@section('template_title')
    Tipo Comprobante
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo Comprobante Venta') }}
                            </span>

                            <div class="float-right">
                                @can('tipo-comprobante-ventas.create')

                                <a href="{{ route('tipo-comprobante-ventas.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
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
                            <table class="table table-striped table-hover"id="tabla1">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>


                                        <th>Tipo Comprobante</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipoComprobanteVentas as $tipoComprobanteVenta)
                                        <tr>


                                            <td>{{ $tipoComprobanteVenta->idTipocomprobante }}</td>
                                            <td>{{ $tipoComprobanteVenta->tcomcomprobante }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('tipo-comprobante-ventas.destroy', $tipoComprobanteVenta ) }}"
                                                    method="POST">
                                                    @can('tipo-comprobante-ventas.show')
                                                    <a class="btn btn-sm btn-primary "
                                                    href="{{ route('tipo-comprobante-ventas.show', $tipoComprobanteVenta ) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('tipo-comprobante-ventas.edit')
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('tipo-comprobante-ventas.edit', $tipoComprobanteVenta ) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('tipo-comprobante-ventas.destroy')
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
