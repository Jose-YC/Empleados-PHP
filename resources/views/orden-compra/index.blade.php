@extends('layouts.app')

@section('template_title')
    Orden Compra
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orden Compra') }}
                            </span>

                             <div class="float-right">
                                @can('orden-compras.create')

                                <a href="{{ route('orden-compras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Fecha Hora</th>
										<th>Descripcion</th>
										<th>Total</th>
										<th>Documento</th>
										<th>Proveedor</th>
										<th>Empleado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($ordenCompras as $ordenCompra)
                                        <tr>
											<td>{{ $ordenCompra->idOrdencompra }}</td>
											<td>{{ $ordenCompra->orcomfecha }} {{ $ordenCompra->orcomhora }}</td>
											<td>@if ($ordenCompra->orcomdescripcion){{ $ordenCompra->orcomdescripcion }} @else --- @endif</td>
											<td>S/. {{ $ordenCompra->orcomtotal }}</td>
											<td>
                                                <a href="{{ Storage::url($ordenCompra->docontable->dconurl) }}"
                                                    download="Orden Compra N°{{ $ordenCompra->idOrdencompra }}.pdf"><i
                                                        class="fas fa-cloud-download-alt"></i></a>
                                            </td>
											<td>{{ $ordenCompra->Proveedore->provrazonsocial }}</td>
											<td>{{ $ordenCompra->Empleado->User->usunombre }}</td>
                                            <td>
                                                <form action="{{ route('orden-compras.destroy',$ordenCompra ) }}" method="POST">
                                                    @can('orden-compras.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('orden-compras.show',$ordenCompra ) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('orden-compras.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('orden-compras.edit',$ordenCompra ) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('orden-compras.destroy')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>

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
