@extends('layouts.app')

@section('content')
<div>
    <h1>{{ __('Register') }}</h1>

    <div>
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span>
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <label for="password-confirm">Confirmar contraseña</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>

            <button type="submit" class="btn btn-primary">
                <span>Registrarse</span>
            </button>
        </form>
    </div>
</div>
@endsection
