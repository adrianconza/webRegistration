@extends('layouts.app')

@section('content')
<div>
    <h1>{{ __('Login') }} / <a href="{{ route('register') }}">Registrarse</a></h1>

    <form method="POST" action="{{ route('login') }}" class="form">
        @csrf

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif

        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Recuérdame</label>

        <button type="submit" class="btn btn-primary">
            Iniciar sesión
        </button>
    </form>
</div>
@endsection
