@extends('layouts.auth')

@section('content')
    <div id="loginform">
        <div class="logo">
            <img src="{{ asset('imagenes/logo-principal.png') }}" alt="{{ config('app.name') }}"/>
            <h3 class="box-title mb-3 mt-3 text-center">{{ __('Login') }}</h3>
        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <form method="POST" class="form-horizontal mt-3 form-material" id="loginform"
                      action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="email" class="col-md-12 col-form-label">@lang('panel.tablas.email')</label>

                        <div class="col-md-12">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="d-flex">
                            <div class="checkbox checkbox-info pt-0">
                                <input id="checkbox-signup" type="checkbox" class="material-inputs chk-col-black"
                                       name="remember" id="remember" @checked(old('remember'))/>
                                <label for="checkbox-signup">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <div class="d-flex">
                            <div class="">
                                <a href="javascript:void(0)" id="to-recover" class="link font-weight-medium">
                                    <i class="fa fa-lock me-1"></i> {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4 mb-3">
                        <div class="col-xs-12">
                            <button class=" btn btn-danger d-block w-100 waves-effect waves-light" type="submit">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Recuperar pass --}}
    <div id="recoverform">
        <div class="logo">
            <img src="{{ asset('imagenes/logo-principal.png') }}" alt="{{ config('app.name') }}"/>

            <h3 class="font-weight-medium mt-3 mb-3">
                {{ __('Reset Password') }}
            </h3>

            <span class="text-muted">
                Introduce tu correo electrónico, y te enviaremos un enlace para restablecer la contraseña.
            </span>
        </div>
        <div class="row mt-3 form-material">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" class="col-12" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-12 col-form-label">@lang('panel.tablas.dni')</label>

                    <div class="col-md-12">
                        <input type="dni" class="form-control @error('dni') is-invalid @enderror"
                               name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                        @error('dni')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-3 mb-4">
                    <div class="col-12">
                        <button class="btn d-block w-100 btn-primary text-uppercase" type="submit" name="action">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <a href="javascript:void(0)" id="to-login" class="link font-weight-medium">
                                Volver al formulario de iniciar sesión
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#to-recover").on("click", function () {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });

        $("#to-login").on("click", function () {
            $("#loginform").slideDown();
            $("#recoverform").fadeOut();
        });
    </script>
@endsection
