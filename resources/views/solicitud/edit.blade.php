@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Solicitud
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Solicitud</span>
                    </div>
                    <div class="card-body">

                        @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif




                        <form method="POST" action="{{ route('solicituds.update', $solicitud) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('solicitud.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
