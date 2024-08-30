@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Comprobante Pago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Comprobante Pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comprobante-pagos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('comprobante-pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
