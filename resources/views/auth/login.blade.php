@extends('auth.master')

@section('content')
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body bg-info">
        <p class="login-box-msg">Iniciar sesión</p>
        <center><img src="{{asset('img/app-logo.png')}}" alt="AdminLTE Logo" class="w-25 img-circle mb-3"
            style="opacity: .8"></center>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{old('email')}}" placeholder="Correo" required autocomplete="email" autofocus>
                <div class="input-group-append input-group-text bg-warning">
                    <span class="fa fa-envelope text-white"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Contraseña" name="password" required autocomplete="current-password">
                <div class="input-group-append input-group-text bg-warning">
                    <span class="fa fa-lock text-white"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="row">
                <div class="col-8">
                    {{-- <div class="icheck-primary">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember Me
                        </label>
                    </div> --}}
                </div>
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-block btn-flat text-white">Acceder</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <hr>

        @if (Route::has('password.request'))
        <p class="mb-0">
            <a href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
        </p>
        @endif
        @if (Route::has('register'))
        <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Registrate</a>
        </p>
        @endif
    </div>
    <!-- /.login-card-body -->
</div>
@endsection