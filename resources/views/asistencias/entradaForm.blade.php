@extends('layouts.windmill')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    <br>
        Formulario
    </h4>

     <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">   
        @include('partials.errorFormulario')

        <form action= "{{ route('asistencia.formEntrada') }}" method="GET"> 

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Seleccione Curso
                </span>

                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="curso_id"
                >
                    <option value=''>---</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                    @endforeach
                </select>
            </label>
            <div class="mt-4">
                <button 
                    class="flex items-center justify-between px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit"
                >
                <span>Seleccionar Curso</span> 
                </button>
            </div>
        </form>

        <br>
        <hr>

        @if(!empty($curso_id))
            <form action= "{{ route('asistencia.registrarEntrada') }}" method="POST"> 
            @csrf

            <input type="hidden" name="curso_id" value={{ $curso_id }}>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                    Seleccione Estudiante
                    </span>

                    <select
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="estudiante_id"
                    >
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                        @endforeach
                    </select>
                </label>

            <br>
            <div class="mt-4">
                <button class="flex items-center justify-between px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit"
                >     
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                <span>Registrar Entrada</span> 
                </button>
        </div>
    </form>
    @endif

</div>

@endsection
