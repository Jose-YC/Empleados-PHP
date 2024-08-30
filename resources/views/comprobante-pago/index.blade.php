@extends('layouts.app')

@section('template_title')
    Comprobante Pago
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Comprobante Pago') }}
                            </span>

                             <div class="float-right">
                             @can('comprobante-pagos.create')
                             <a href="{{ route('comprobante-pagos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>No</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comprobantePagos as $comprobantePago)
                                        <tr>

											<td>{{ $comprobantePago->idComprobante }}</td>
											<td>{{ $comprobantePago->cpagofeha }}</td>
											<td>{{ $comprobantePago->cpagohora }}</td>
											<td>{{ $comprobantePago->cpagototal }}</td>

                                            <td>
                                                <form action="{{ route('comprobante-pagos.destroy',$comprobantePago ) }}" method="POST">
                                                    @can('comprobante-pagos.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('comprobante-pagos.show',$comprobantePago ) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('comprobante-pagos.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('comprobante-pagos.edit',$comprobantePago ) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('comprobante-pagos.destroy')
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
