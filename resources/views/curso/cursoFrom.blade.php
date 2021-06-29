@extends('layouts.temp')
@section('contenido')
    <h1>Formulario de Cursos</h1>

    <p>
        <a href="{{ route('curso.index') }}">Listado de Cursos</a>
    </p>

    @if(isset($curso))
        <form action= "{{ route('curso.update', $curso) }}" method="POST"> 
             @method('PATCH')
    @else
        <form action= "{{ route('curso.store') }}" method="POST"> 
    @endif

        @csrf
        <label for="grupo">Grupo:</label>
        <input type="text" name="grupo" id="grupo" value= "{{$curso->grupo ?? '' }}">
        <br>

        <label for="folio">Folio:</label>
        <input type="text" name="folio" id="folio" value= "{{$curso->folio ?? '' }}">
        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value= "{{$curso->nombre ?? '' }}">
        <br>

        <label for="dependencia">Dependencia:</label>
        <input type="text" name="dependencia" id="dependencia" value= "{{$curso->dependencia ?? '' }}">
        <br>

        <label for="titular">Titular:</label>
        <input type="text" name="titular" id="titular" value= "{{$curso->titular ?? '' }}"> 
        <br>

        <input type="submit" value="Guardar">

    </form>

@endsection
