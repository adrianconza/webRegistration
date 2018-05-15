@extends('layouts.app')

@section('content')
<div>
    <h1>Registrarse</h1>

    <div>
        <form action="{{ route('people.store') }}" method="POST" class="form">
            @csrf

            <label for="cedula">Cedula</label>
            <input id="cedula" type="text" name="cedula" required placeholder="Ingrese su cedula">

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

            <button type="submit" class="btn btn-primary fa fa-floppy-o">
                <span>Guardar</span>
            </button>
        </form>
    </div>
</div>
@endsection
