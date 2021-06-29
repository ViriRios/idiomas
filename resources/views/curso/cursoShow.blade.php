@extends('layouts.temp')
@section('contenido')
    <h1>Detalles del Curso</h1>

    <p>
        <a href= "{{ route('curso.index') }}">Listado de Cursos</a>
    </p>


    <table border="1">
        <thead>
            <td>ID</td>
            <td>Grupo</td>
            <td>Folio</td>
            <td>Nombre</td>
            <td>Dependencia</td>
            <td>Titular</td>
        </thead>
        <tbody> 
            <tr>
            <td>{{$curso->id}}</td>
            <td>{{$curso->grupo}}</td>
            <td>{{$curso->folio}}</td>
            <td>{{$curso->nombre}}</td>
            <td>{{$curso->dependencia}}</td>
            <td>{{$curso->titular}}</td>
        </tr>
        </tbody>
    </table>

    <form action= "{{ route('curso.destroy', $curso) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar Curso">
    </form>

@endsection