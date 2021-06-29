@extends('layouts.windmill')
@section('contenido')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Listado de Cursos
    </h2>
    
<!-- With actions -->
<h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Cursos Disponibles
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Nombre</th>
                      <th class="px-4 py-3">Dependencia</th>
                      <th class="px-4 py-3">Grupo</th>
                      <th class="px-4 py-3">Titular</th>
                      <th class="px-4 py-3">Folio</th>
                      <th class="px-4 py-3">Usuario</th>
                      <th class="px-4 py-3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @foreach($cursos as $curso)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                        <a href="{{route('curso.show', $curso->id)}}">{{$curso->nombre}}</a>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$curso->dependencia}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$curso->grupo}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                       {{$curso->titular}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                       {{$curso->folio}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                       {{$curso->user->name}}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <a
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                            href="{{ route('curso.edit', $curso) }}"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                            </a>
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"
                              ></path>
                            </svg>
                          </button>
                        </div>
                      </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <div>
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href= "{{ route('curso.create') }}">
            Agregar Curso
        </a>
    </div>


@endsection