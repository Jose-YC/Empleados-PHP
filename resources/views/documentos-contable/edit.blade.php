@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Documentos Contable
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Documentos Contable</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('documentos-contables.update', $documentosContable ) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('documentos-contable.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
