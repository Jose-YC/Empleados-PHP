@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                            <div class="float-right">
                                @can('productos.create')
                                    <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"
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
                            <table class="table   table-striped table-hover" id="table1">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Stock Min</th>
                                        <th>Tipo de producto</th>
                                        <th>Uninad de medida</th>
                                        @can('productos.destroy')
                                            <th>Acciones</th>
                                        @endcan
                                        @can('solicituds.index')
                                            <th>Solicitudes</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->idProducto }}</td>
                                            <td>{{ $producto->pronombre }}</td>
                                            <td>{{ $producto->prodescripcion }}</td>
                                            <td>{{ $producto->propreciocompra }}</td>
                                            <td>{{ $producto->propreciounitario }}</td>
                                            <td>
                                                @if ($producto->prostock < $producto->prostockminimo)
                                                    <span
                                                        class="badge badge-danger">{{ $producto->prostock }}</span>@else{{ $producto->prostock }}
                                                @endif
                                            </td>
                                            <td>{{ $producto->prostockminimo }}</td>
                                            <td>{{ $producto->TipoProducto->tpronombre }}</td>
                                            <td>{{ $producto->Unidadmedida->umednombre }}</td>
                                            <td>
                                                @can('productos.edit')
                                                    <div class="btn-group-vertical" role="group"
                                                        aria-label="Vertical button group">
                                                        @can('productos.show')
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('productos.show', $producto) }}"><i
                                                                    class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        @endcan
                                                        @can('productos.edit')
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('productos.edit', $producto) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @endcan
                                                        @can('productos.destroy')
                                                            <form action="{{ route('productos.destroy', $producto) }}"
                                                                method="POST">
                                                                @csrf @method('DELETE')<button type="submit"
                                                                    class="btn btn-danger btn-sm"><i class="fa  fa-trash"></i>
                                                                    {{ __('Delete') }}</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                @endcan

                                            </td>
                                            <td>
                                                @can('solicituds.index')
                                                    @if ($producto->prostock < $producto->prostockminimo)
                                                        <a
                                                            class="btn btn-sm btn-primary "href="{{ route('producto.productosolicitud', $producto) }}"><i
                                                                class="fas fa-file"></i> Solicitudes</a>
                                                    @endif
                                                @endcan
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
