@extends('layouts.temp')
@section('contenido')
    <h1>Listado de Cursos</h1>

    <p>
        <a href= "{{ route('curso.create') }}">Agregar Curso</a>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Grupo</th>
                <th>Folio</th>
                <th>Nombre</th>
                <th>Dependencia</th>
                <th>Titular</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($cursos as $curso)
            <tr>
                <td>{{$curso->id}}</td>
                <td>{{$curso->grupo}}</td>
                <td>{{$curso->folio}}</td>
                <td>
                    <a href="{{route('curso.show', $curso->id)}}">{{$curso->nombre}}</a>
                </td>
                <td>{{$curso->dependencia}}</td>
                <td>{{$curso->titular}}</td>
                <td>
                    <a href="{{ route('curso.edit', $curso) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
