<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cursos = Curso::all();

        $cursos = Auth::user()->cursos()->get();

        return view('curso.cursoIndex', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.cursoFrom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'titular' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'folio' => 'required|integer|min:2|unique:App\Models\Curso,folio',
            'grupo' => 'required|string|min:2|max:3',
        ]);

        $request->merge(['user_id' => $request->user()->id]);

        Curso::create($request->all());

        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $estudiantes = Estudiante::get();
         
        return view('curso.cursoShow', compact('curso', 'estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('curso.cursoFrom', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'titular' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'folio' => ['required', 'integer', 'min:2', Rule::unique('cursos')->ignore($curso->id)],
            'grupo' => 'required|string|min:2|max:3',
        ]);

        Curso::where('id', $curso->id)->update($request->except('_token', '_method'));

        return redirect()->route('curso.show', $curso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('curso.index');
    }

    /**
     * Agrega estudiante a curso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */

    public function agregaEstudiante(Request $request, Curso $curso)
    {
        $curso->estudiantes()->sync($request->estudiante_id);

        return redirect()->route('curso.show', $curso);
    }

}
