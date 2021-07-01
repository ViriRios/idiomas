@extends('layouts.windmill')
@section('contenido')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Archivos
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">   
        @include('partials.errorFormulario')

        <form action= "{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Seleccione el Archivo a Cargar
                </span>
                <input type="file" name="archivo" id="archivo">

            </label>
            <div class="mt-4">
                <button 
                    class="flex items-center justify-between px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit"
                >
                <span>Cargar</span> 
                </button>
            </div>
        </form>
    </div>
    
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Nombre del Archivo</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @foreach($archivos as $archivo)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                        <a>{{$archivo->nombreOri}}</a>
                        </div>
                      </td>
                      <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <a
                            class="flex items-center justify-between px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" 
                            href="{{ route('archivo.descargar', $archivo) }}">
                                Descargar Archivo
                            </a>
                        </div>
                        <form action="{{ route('archivo.destroy', $archivo) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <div>
                                <br>
                                <button    
                                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                    type = "sumbit"    
                                >         
                                    <span>Eliminar Archivo</span>
                                </button>
                            </div>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
