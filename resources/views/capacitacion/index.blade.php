    @extends('layouts.app')

@section('template_title')
    Capacitacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Capacitacion') }}
                            </span>
                            <div class="float-right">
                                @can('capacitacions.create')
                                    <a href="{{ route('capacitacions.create') }}" class="btn btn-primary btn-sm float-right"
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
                            <table class="table table-striped table-hover"id="tabla1">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Capacitador</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th>
                                            Estado De la solicitud
                                        </th>
                                        <th>Action</th>
                                        <th>Asistencias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($capacitacions as $capacitacion)
                                        <tr>
                                            <td>{{ $capacitacion->idCapacitacion }}</td>
                                            <td>{{ $capacitacion->capcapacitador }}</td>
                                            <td>{{ $capacitacion->capfechainicio }}</td>
                                            <td>{{ $capacitacion->capfechafin }}</td>
                                            <td>


                                                @if ( $capacitacion->solicitud != null)
                                                    {{ $capacitacion->solicitud->solestado }}
                                                @else
                                                    ---
                                                @endif


                                            </td>
                                            <td>
                                                <form action="{{ route('capacitacions.destroy', $capacitacion) }}"
                                                    method="POST">
                                                    @can('capacitacions.show')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('capacitacions.show', $capacitacion) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan
                                                    @can('capacitacions.edit')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('capacitacions.edit', $capacitacion) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('capacitacions.destroy')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endcan
                                                </form>
                                            </td>
                                            <td>

                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('capacitacions.asist', $capacitacion) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Asistencia ') }}</a>

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
