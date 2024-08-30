@extends('auth.layout')

@section('title', 'Iniciar Sesión')
@section('auth')
    <div class="card">
        <div class="card-body">
            <!-- Logo -->

            <h4>los correos para las areas son :</h4>
                <div class="">
                    <div class="alert alert-primary" role="alert">
                       area de abastecimiento:
                       admin@example.com
                       password
                      </div>
                      <div class="alert alert-secondary" role="alert">
                      area de finanzas:
                      finanzas1@grifo.com
                      password
                      </div>
                      <div class="alert alert-success" role="alert">
                        area de compras:
                        compras1@grifo.com
                        password
                      </div>
                      <div class="alert alert-danger" role="alert">
                        area de Ventas:
                        ventas1@grifo.com
                        password
                      </div>
                      <div class="alert alert-warning" role="alert">
                       area de Seguridad:
                       seguridad1@grifo.com
                       password
                      </div>

                </div>
            <div class="app-brand ">

                <a href="/" class="app-brand-link w-100 d-flex flex-column gap-3">
                    <span class="app-brand-logo">
                        <img src="{{ asset('assets/images/logo/favicon.png') }}" alt="Logo">
                    </span>
                    <span class="app-brand-text text-body fw-bolder text-uppercase fs-5 d-block">
                        {{ config('app.name') }}
                    </span>
                </a>
            </div>
            <!-- /Logo -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="usuemail" class="form-label">{{ __('Username') }}</label>

                    <input id="usuemail" type="text" class="form-control @error('usuemail') is-invalid @enderror"
                        name="usuemail"  autocomplete="name" autofocus
                        placeholder="Email de Usuario" value="admin@example.com">
                        {{-- value="{{ old('name') }}" --}}
                    @error('usuemail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="usucontra" class="form-label">{{ __('Password') }}</label>
                    <input id="usucontra" type="password" class="form-control @error('usucontra') is-invalid @enderror"
                        name="usucontra" autocomplete="current-password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="password">
                    @error('usucontra')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
