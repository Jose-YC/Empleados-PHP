@extends('layouts.app')

@section('template_title')
    {{-- {{ $capacitacion->name ?? "{{ __('Show') Capacitacion" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Capacitacion</span>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Numero de la capacitacion:</strong>
                            {{ $capacitacion->idCapacitacion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de inicio:</strong>
                            {{ $capacitacion->capfechainicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha final:</strong>
                            {{ $capacitacion->capfechafin }}
                        </div>
                        <div class="form-group">
                            <strong>Capacitador:</strong>
                            {{ $capacitacion->capcapacitador }}
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">

                        Lista de Empleados
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Asistio</th>
                                        <th scope="col">Justificante</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencia as $item)
                                        <tr>
                                            <td scope="row">{{ $item->idEmpleado }}</td>
                                            <td>{{ $item->asistio }}</td>
                                            <td>
                                                @if ($item->asistio === 'si')
                                                    --
                                                @else
                                                    {{ $item->justificacion }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="card">

                    <x-extras.regreso :url="'capacitacions.index'"/>
                </div>
            </div>
        </div>
    </section>
@endsection
