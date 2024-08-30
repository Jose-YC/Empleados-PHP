@extends('layouts.app')

@section('template_title')
    Asistencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asistencia') }}
                            </span>

                             <div class="float-right">
                                @can('asistencias.create')
                                <a href="{{ route('asistencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>


										<th>Empleado</th>
										<th>Capacitacion</th>
										<th>Departamento</th>
										<th>Asistio</th>
										<th>Justificacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencias as $asistencia)
                                        <tr>


											<td>{{ $asistencia->idAsistencia }}</td>
											<td>{{ $asistencia->idEmpleado }}</td>
											<td>{{ $asistencia->idCapacitacion }}</td>
											<td>{{ $asistencia->idDepartamento }}</td>
											<td>{{ $asistencia->asistio }}</td>
											<td>{{ $asistencia->justificacion }}</td>

                                            <td>
                                                <form action="{{ route('asistencias.destroy',$asistencia ) }}" method="POST">
                                                   @can('asistencias.show')
                                                   <a class="btn btn-sm btn-primary " href="{{ route('asistencias.show',$asistencia) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                   @endcan
                                                   @can('asistencias.edit')
                                                   <a class="btn btn-sm btn-success" href="{{ route('asistencias.edit',$asistencia) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                   @endcan
                                                   @can('asistencias.destroy')
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
