@extends('layouts.windmill')
@section('contenido')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Detalles del Curso
</h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                {{ $curso->nombre }}
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                <ul>
                    <li>Dependencia: {{ $curso->dependencia }} </li>
                    <li>Grupo: {{ $curso->grupo }} </li>
                    <li>Titular: {{ $curso->titular }} </li>
                    <li>Folio: {{ $curso->folio }} </li>
                </ul>
            </p>
        </div>

        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            Estudiantes en el curso
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            <ul>
            @foreach($curso->estudiantes as $estudiante)
                <li>{{$estudiante->nombre}}</li>
            @endforeach
            </ul>
        </p>
        </div>
    </div>

        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Agregar Estudiantes
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <form action="{{route('curso.agrega-estudiante', $curso)}}" method="POST">
                        @csrf
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Seleccione Estudiante
                            </span>

                            <select
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                                multiple=""
                                name="estudiante_id[]"
                            >
                            @foreach($estudiantes as $estudiante)
                                <option value="{{$estudiante->id}}" {{ array_search($estudiante->id, $curso->estudiantes->pluck('id')->toArray()) !== false ? 'selected' : ''}}>{{$estudiante->nombre}}</option>
                            @endforeach
                        </select>
                    </label>
                    <br>

                    <button    
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        type = "sumbit"    
                        >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>           
                        <span>Agregar</span>
                    </button>
                </form>
                </p>
              </div>
        </div>

    <form action="{{ route('curso.destroy', $curso) }}" method="POST">
        @csrf
        @method('DELETE')

    <div>
        <br>
        <button    
        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
        type = "sumbit"    
        >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z"></path>
        </svg>              
        <span>Eliminar Curso</span>
    </button>
    </div>
</form>

@endsection