@extends('layouts.app')

@section('content')
<div>
    <h1>Datos de persona</h1>

    <div class="form">

        <label for="cedula">Cedula</label>
        <input id="cedula" type="text" name="cedula" value="{{ $person->cedula }}" readonly>

        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" value="{{ $person->name }}" readonly>

        <label for="last-name">Apellido</label>
        <input id="last-name" type="text" name="last_name" value="{{ $person->last_name }}" readonly>

        <label for="email">Correo</label>
        <input id="email" type="email" name="email" value="{{ $person->email }}" readonly>

        <label for="phone">Telefono</label>
        <input id="phone" type="tel" name="phone" value="{{ $person->phone }}" readonly>

        <label for="birth-date">Fecha de nacimiento</label>
        <input id="birth-date" type="date" name="birth_date" value="{{ $person->birth_date }}" readonly >

        <label for="address">Direccion</label>
        <input id="address" type="text" name="address" value="{{ $person->address }}" readonly>

        <label for="position">Cargo</label>
        <input id="position" type="text" name="position" value="{{ $person->position }}" readonly>

        <select id="workshops" multiple name="workshops[]" disabled>
            @foreach($person->workshops as $workshop)
                <option value="{{ $workshop->id }}">Nombre: {{ $workshop->name }}, Duración: {{ $workshop->duration }}min</option>
            @endforeach
        </select>

        <a href="{{ route('people.index') }}"  class="btn btn-secondary fa fa-chevron-left">
            <span>Regresar</span>
        </a>
    </div>
</div>
@endsection
