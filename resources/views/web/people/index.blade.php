@extends('layouts.app')

@section('content')
<div>
    <h1>Personas Registradas</h1>

    <div>
        <a href="{{ route('people.create') }}">
           Crear
        </a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Ciudad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                    <tr>
                        <td>{{ $person->id }}</td>
                        <td>{{ $person->name }} {{ $person->last_name }} </td>
                        <td>{{ $person->phone }} </td>
                        <td>{{ $person->email }} </td>
                        <td>{{ $person->address }} </td>
                        <td>
                            <a href="{{ route('people.show', $person->id) }}">Ver</a>
                            <a href="{{ route('people.edit', $person->id) }}">Editar</a>
                            <form action="{{ route('people.destroy', $person->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
