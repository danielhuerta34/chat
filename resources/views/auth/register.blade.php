@extends('auth.master')

@section('content')
<div class="card">
    <div class="card-body login-card-body bg-info">
        <p class="login-box-msg">Registrate</p>
        <center><img src="{{asset('img/app-logo.png')}}" alt="AdminLTE Logo" class="w-25 img-circle mb-3"
            style="opacity: .8"></center>
        <form action="{{route('register')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name"
                    autofocus>
                <div class="input-group-append input-group-text bg-warning">
                    <span class="fa fa-user text-white"></span>
                </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{old('email')}}" placeholder="Correo" required autocomplete="email">
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
                    placeholder="Contraseña" name="password" required autocomplete="new-password">
                <div class="input-group-append input-group-text bg-warning">
                    <span class="fa fa-lock text-white"></span>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control" placeholder="Vuelve a escribir la contraseña"
                    name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append input-group-text bg-warning">
                    <span class="fa fa-lock text-white"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-block btn-flat text-white">Registrarse</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        @if (Route::has('login'))
        <hr>
        <p class="mb-0 text-center">
            <a href="{{ route('login') }}" class="text-center">Iniciar sesión</a>
        </p>
        @endif
    </div>
    <!-- /.login-card-body -->
</div>
@endsection