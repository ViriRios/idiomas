@extends('layouts.windmill')
@section('contenido')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    <br>
        Formulario
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" >

    @include('partials.errorFormulario')

    @if(isset($curso))
        <form action= "{{ route('curso.update', $curso) }}" method="POST"> 
             @method('PATCH')
    @else
        <form action= "{{ route('curso.store') }}" method="POST"> 
    @endif
     @csrf

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre del curso:</span>
            <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text"
            name="nombre"
            id="nombre"
            value="{{ old('nombre') ?? $curso->nombre ?? '' }}" 
            />
        </label>
        <br>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Dependencia:</span>
            <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text"
            name="dependencia"
            id="dependencia"
            value="{{ old('dependencia') ?? $curso->dependencia ?? '' }}" 
            />
        </label>
        <br>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Grupo:</span>
            <input
            class="block w-full mt-1 text-sm @error('grupo') border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red @enderror  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text"
            name="grupo"
            id="grupo"
            value="{{ old('grupo') ?? $curso->grupo ?? '' }}" 
            />
            @error('grupo')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{$message}}
                </span>
            @enderror
        </label>
        <br>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Titular:</span>
            <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text"
            name="titular"
            id="titular"
            value="{{ old('titular') ?? $curso->titular ?? '' }}" 
            />
        </label>
        <br>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Folio del Curso:</span>
            <input
            class="block w-full mt-1 text-sm @error('folio') border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red @enderror dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text"
            name="folio"
            id="folio"
            value="{{ old('folio') ?? $curso->folio ?? '' }}" 
            />
            @error('folio')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{$message}}
                </span>
            @enderror
        </label>

        <br>
        <div class="mt-5">
            <button class="flex items-center justify-between px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >     
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            <span>Guardar</span> 
            </button>
        </div>
    </form>
</div>

@endsection
