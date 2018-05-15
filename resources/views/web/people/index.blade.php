@extends('layouts.app')

@section('content')
<div>
    <h1>Personas Registradas</h1>

    <div>
        <a href="{{ route('people.create') }}" class="btn btn-primary fa fa-plus">
            <span>Crear</span>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                    <tr id="person-{{ $person->id }}">
                        <td>{{ $person->id }}</td>
                        <td>{{ $person->name }} {{ $person->last_name }} </td>
                        <td>{{ $person->phone }} </td>
                        <td>{{ $person->email }} </td>
                        <td>{{ $person->address }} </td>
                        <td>
                            <a href="{{ route('people.show', $person->id) }}" class="btn btn-primary fa fa-external-link" title="Mostrar"></a>
                            <a href="{{ route('people.edit', $person->id) }}" class="btn btn-primary fa fa-pencil" title="Editar"></a>
                            <button class="btn btn-danger fa fa-trash" title="Eliminar" onclick="showDialogDestroy('person-'+{{ $person->id }})"/>
                        </td>
                    </tr>
                    <tr id="person-destroy-{{ $person->id }}" class="display-none">
                        <td colspan="6">
                            <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="display-inline-block">
                                @method('DELETE')
                                @csrf
                                <span>Esta seguro de eliminar a {{ $person->name }} {{ $person->last_name }}</span>
                                <button type="submit" class="btn btn-primary fa fa-check">
                                    <span>Si</span>
                                </button>
                                <button class="btn btn-primary fa fa-times">
                                    <span>No</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
