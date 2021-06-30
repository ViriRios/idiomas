<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function formEntrada(Request $request)
    {
        $cursos = Curso::all();
        $curso_id = $request->curso_id;

        if(!empty($curso_id)){
            $estudiantes = Curso::find($curso_id)->estudiantes()->get();
        }else {
            $estudiantes = [];
        }

        return view('asistencias.entradaForm', compact('cursos', 'estudiantes', 'curso_id'));
    }

    public function registrarEntrada(Request $request)
    {
        $request->merge([
            'fecha' => today(),
            'entrada' => now(),
            'user_id' => Auth::id(),
        ]);

        Asistencia::create($request->all());

        return redirect()->route('asistencia.formEntrada');
    }

    public function formSalida()
    {
        $asistencias = Asistencia::whereNull('salida')->get();

        return view('asistencias.salidaForm', compact('asistencias'));
    }

    public function registrarSalida(Asistencia $asistencia)
    {
        $asistencia->salida = now();

        $asistencia->save();
        
        return redirect()->route('asistencia.formSalida');
    }


}
