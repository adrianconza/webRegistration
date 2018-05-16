@extends('layouts.app')

@section('content')
<div>
    <h1>Nuevo taller</h1>

    <div>
        <form action="{{ route('workshops.store') }}" method="POST" class="form">
            @csrf

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" required placeholder="Ingrese el nombre">

            <label for="duration">Duracion</label>
            <input id="duration" type="number" name="duration" required placeholder="Ingrese la duracion en minutos">

            <button type="submit" class="btn btn-primary fa fa-floppy-o">
                <span>Guardar</span>
            </button>
            <a href="{{ route('workshops.index') }}" class="btn btn-secondary fa fa-chevron-left">
                <span>Cancelar</span>
            </a>
        </form>
    </div>
</div>
@endsection
