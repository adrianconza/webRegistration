@extends('layouts.app')

@section('content')
<div>
    <h1>{{ $from == 1 ? 'Registrarse' : 'Añadir persona' }}</h1>

    <div>
        <form action="{{ route('people.store') }}" method="POST" class="form">
            @csrf
            <input id="from" type="hidden" name="from" value="{{ $from }}">

            <label for="cedula">Cédula</label>
            <input id="cedula" type="text" name="cedula" required placeholder="Ingrese su cédula" autofocus value="{{ old('cedula') }}">
            @if ($errors->has('cedula'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cedula') }}</strong>
                </div>
            @endif

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" required placeholder="Ingrese su nombre" value="{{ old('name') }}">

            <label for="last-name">Apellido</label>
            <input id="last-name" type="text" name="last_name" required placeholder="Ingrese su apellido" value="{{ old('last_name') }}">

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" required placeholder="Ingrese su correo" value="{{ old('email') }}">

            <label for="phone">Teléfono</label>
            <input id="phone" type="tel" name="phone" required placeholder="Ingrese su teléfono" value="{{ old('phone') }}">
            @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </div>
            @endif

            <label for="birth-date">Fecha de nacimiento</label>
            <input id="birth-date" type="date" name="birth_date" required value="{{ old('birth_date') }}">
            @if ($errors->has('birth_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </div>
            @endif

            <label for="address">Dirección</label>
            <input id="address" type="text" name="address" required placeholder="Ingrese su Dirección" value="{{ old('address') }}">

            <label for="position">Cargo</label>
            <input id="position" type="text" name="position" required placeholder="Ingrese su cargo" value="{{ old('position') }}">

            <label for="workshops">Talleres</label>
            <select id="workshops" multiple name="workshops[]">
                @foreach($workshops as $workshop)
                    <option value="{{ $workshop->id }}">Nombre: {{ $workshop->name }}, Duración: {{ $workshop->duration }}min</option>
                @endforeach
            </select>
            @if ($errors->has('workshops'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('workshops') }}</strong>
                </div>
            @endif

            <button type="submit" class="btn btn-primary fa fa-floppy-o">
                <span>Guardar</span>
            </button>

            @if ($from != 1)
                <a href="{{ route('people.index') }}" class="btn btn-secondary fa fa-chevron-left">
                    <span>Cancelar</span>
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
