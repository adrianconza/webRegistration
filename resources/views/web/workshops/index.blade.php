@extends('layouts.app')

@section('content')
<div>
    <h1>Talleres</h1>

    <div>
        <a href="{{ route('workshops.create') }}" class="btn btn-primary fa fa-plus">
            <span>Crear</span>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Duracion</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workshops as $workshop)
                    <tr id="person-{{ $workshop->id }}">
                        <td>{{ $workshop->id }}</td>
                        <td>{{ $workshop->name }}</td>
                        <td>{{ $workshop->duration }} min</td>
                        <td>
                            @if ($workshop->active)
                                <input type="checkbox" checked disabled>
                            @else
                                <input type="checkbox" disabled>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('workshops.show', $workshop->id) }}" class="btn btn-primary fa fa-external-link" title="Mostrar"></a>
                            <a href="{{ route('workshops.edit', $workshop->id) }}" class="btn btn-primary fa fa-pencil" title="Editar"></a>
                            <button class="btn btn-{{ $workshop->active ? 'danger' : 'primary' }} fa fa-{{ $workshop->active ? 'trash' : 'check' }}" title="Eliminar" onclick="showDialogDestroy('person-'+{{ $workshop->id }})"/>
                        </td>
                        <td colspan="6" class="display-none">
                            <div class="dialog-destroy">
                                <span>Esta seguro que desea {{ $workshop->active ? 'desactivar' : 'activar' }} el taller de {{ $workshop->name }}</span>
                                <div class="dialog-destroy-btn">
                                    <form action="{{ route('workshops.destroy', $workshop->id) }}" method="POST" class="display-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger fa fa-check">
                                            <span>Si</span>
                                        </button>
                                    </form>
                                    <button class="btn btn-secondary fa fa-times" onclick="showDialogDestroy('person-'+{{ $workshop->id }})">
                                        <span>No</span>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
