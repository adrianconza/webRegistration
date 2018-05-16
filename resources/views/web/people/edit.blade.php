@extends('layouts.app')

@section('content')
<div>
    <h1>Editar persona</h1>

    <div>
        <form action="{{ route('people.update', $person->id) }}" method="POST" class="form">
            @method('PUT')
            @csrf

            <label for="cedula">Cedula</label>
            <input id="cedula" type="text" name="cedula" value="{{ $person->cedula }}" required placeholder="Ingrese su cedula" autofocus>

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ $person->name }}" required placeholder="Ingrese su nombre">

            <label for="last-name">Apellido</label>
            <input id="last-name" type="text" name="last_name" value="{{ $person->last_name }}" required placeholder="Ingrese su apellido">

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ $person->email }}" required placeholder="Ingrese su correo">

            <label for="phone">Telefono</label>
            <input id="phone" type="tel" name="phone" value="{{ $person->phone }}" required placeholder="Ingrese su telefono">

            <label for="birth-date">Fecha de nacimiento</label>
            <input id="birth-date" type="date" name="birth_date" value="{{ $person->birth_date }}" required>

            <label for="address">Direccion</label>
            <input id="address" type="text" name="address" value="{{ $person->address }}" required placeholder="Ingrese su direccion">

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
