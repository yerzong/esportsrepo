@extends('layout')

@section('content')
    <div class="container">
        <h1>Listado de Organizaciones</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('organizations.create') }}" class="btn btn-primary">Agregar Organización</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $organization)
                    <tr>
                        <td>{{ $organization->id }}</td>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->email }}</td>
                        <td>{{ $organization->phone }}</td>
                        <td>{{ $organization->country }}</td>
                        <td>
                            <a href="{{ route('organizations.show', $organization->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta organización?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
