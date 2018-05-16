@extends('layouts.app')

@section('content')
<div>
    <h1>Datos del taller</h1>

    <div class="form">

        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" value="{{ $workshop->name }}" readonly>

        <label for="duration">Duración</label>
        <input id="duration" type="text" name="duration" value="{{ $workshop->duration }} min" readonly>

        <label for="active">Activo</label>
        <input id="active" type="checkbox" checked="{{ $workshop->active }}" disabled>

        <a href="{{ route('workshops.index') }}"  class="btn btn-secondary fa fa-chevron-left">
            <span>Regresar</span>
        </a>
    </div>
</div>
@endsection
