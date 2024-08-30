@extends('layouts.app')

@section('template_title')
    Estados Financiero
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estados Financiero') }}
                            </span>

                             <div class="float-right">
                               @can('estados-financieros.create')
                               <a href="{{ route('estados-financieros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Estado Financiero Tipo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estadosFinancieros as $estadosFinanciero)
                                        <tr>


											<td>{{ $estadosFinanciero->idEstadofinanciero }}</td>
											<td>{{ $estadosFinanciero->esfitipo }}</td>

                                            <td>
                                                <form action="{{ route('estados-financieros.destroy',$estadosFinanciero ) }}" method="POST">
                                                   @can('estados-financieros.show')
                                                   <a class="btn btn-sm btn-primary " href="{{ route('estados-financieros.show',$estadosFinanciero ) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                   @endcan
                                                   @can('estados-financieros.edit')
                                                   <a class="btn btn-sm btn-success" href="{{ route('estados-financieros.edit',$estadosFinanciero ) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                   @endcan
                                                   @can('estados-financieros.destroy')
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
