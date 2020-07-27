@extends('layouts.appAuth')

@section('title', 'Masuk')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('')}}"><b>Pengaduan</b> Masyarakat</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Masuk untuk memulai sesi Anda.</p>

        <form action="{{ route('login') }}" method="post">

            @csrf

            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}> Ingat saya
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                </div>
            </div>
        </form>

        @if (Route::has('password.request'))
        <a class="text-center" href="{{ route('password.request') }}">
            {{ __('Lupa password?') }}
        </a>
        <br>
        @endif
        <a href="{{ route('register') }}" class="text-center">Daftar Akun</a>

    </div>
</div>
@endsection
