@extends('layouts.app')

@section('content')
<div>
    <h1>Nuevo taller</h1>

    <div>
        <form action="{{ route('workshops.store') }}" method="POST" class="form">
            @csrf

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" required placeholder="Ingrese el nombre" autofocus value="{{ old('name') }}">

            <label for="duration">Duración</label>
            <input id="duration" type="number" name="duration" required placeholder="Ingrese la duración en minutos" value="{{ old('duration') }}">
            @if ($errors->has('duration'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('duration') }}</strong>
                </div>
            @endif

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
