@extends('layouts.app')

@section('content')
<div>
    <h1>Editar persona</h1>

    <div>
        <form action="{{ route('people.update', $person->id) }}" method="POST" class="form">
            @method('PUT')
            @csrf

            <label for="cedula">Cédula</label>
            <input id="cedula" type="text" name="cedula" value="{{ $person->cedula }}" required placeholder="Ingrese su cédula" autofocus>
            @if ($errors->has('cedula'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('cedula') }}</strong>
                </div>
            @endif

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ $person->name }}" required placeholder="Ingrese su nombre">

            <label for="last-name">Apellido</label>
            <input id="last-name" type="text" name="last_name" value="{{ $person->last_name }}" required placeholder="Ingrese su apellido">

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ $person->email }}" required placeholder="Ingrese su correo">

            <label for="phone">Teléfono</label>
            <input id="phone" type="tel" name="phone" value="{{ $person->phone }}" required placeholder="Ingrese su teléfono">
            @if ($errors->has('phone'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('phone') }}</strong>
                </div>
            @endif

            <label for="birth-date">Fecha de nacimiento</label>
            <input id="birth-date" type="date" name="birth_date" value="{{ $person->birth_date }}" required>
            @if ($errors->has('birth_date'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </div>
            @endif

            <label for="address">Dirección</label>
            <input id="address" type="text" name="address" value="{{ $person->address }}" required placeholder="Ingrese su dirección">

            <label for="position">Cargo</label>
            <input id="position" type="text" name="position" value="{{ $person->position }}" required placeholder="Ingrese su cargo">

            <button type="submit" class="btn btn-primary fa fa-floppy-o">
                <span>Guardar</span>
            </button>
            <a href="{{ route('people.index') }}" class="btn btn-secondary fa fa-chevron-left">
                <span>Cancelar</span>
            </a>
        </form>
    </div>
</div>
@endsection
