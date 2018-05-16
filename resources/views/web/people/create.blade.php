@extends('layouts.app')

@section('content')
<div>
    <h1>{{ $from == 1 ? 'Registrarse' : 'Añadir persona' }}</h1>

    <div>
        <form action="{{ route('people.store') }}" method="POST" class="form">
            @csrf
            <input id="from" type="hidden" name="from" value="{{ $from }}">

            <label for="cedula">Cedula</label>
            <input id="cedula" type="text" name="cedula" required placeholder="Ingrese su cedula" autofocus>

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" required placeholder="Ingrese su nombre">

            <label for="last-name">Apellido</label>
            <input id="last-name" type="text" name="last_name" required placeholder="Ingrese su apellido">

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" required placeholder="Ingrese su correo">

            <label for="phone">Telefono</label>
            <input id="phone" type="tel" name="phone" required placeholder="Ingrese su telefono">

            <label for="birth-date">Fecha de nacimiento</label>
            <input id="birth-date" type="date" name="birth_date" required>

            <label for="address">Direccion</label>
            <input id="address" type="text" name="address" required placeholder="Ingrese su direccion">

            <label for="position">Cargo</label>
            <input id="position" type="text" name="position" required placeholder="Ingrese su cargo">

            <label for="workshops">Talleres</label>
            <select id="workshops" multiple name="workshops[]">
                @foreach($workshops as $workshop)
                    <option value="{{ $workshop->id }}">Nombre: {{ $workshop->name }}, Duración: {{ $workshop->duration }}min</option>
                @endforeach
            </select>

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
