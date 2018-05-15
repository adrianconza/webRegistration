@extends('layouts.app')

@section('content')
<div>
    <h1>Registrarse</h1>

    <div>
        <span>Cedula: {{ $person->cedula }}</span>

        <span>Nombre: {{ $person->name }}</span>

        <span>Apellido: {{ $person->last_name }}</span>

        <span>Correo: {{ $person->email }}</span>

        <span>Telefono: {{ $person->phone }}</span>

        <span>Fecha de nacimiento: {{ $person->birth_date }}</span>

        <span>Direccion: {{ $person->address }}</span>

        <span>Cargo: {{ $person->position }}</span>

        <a href="{{ route('people.index') }}">Regresar</a>
    </div>
</div>
@endsection
