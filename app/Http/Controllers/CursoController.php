<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Obtiene los creadores y cursos
        
        $datos['cursos'] = Curso::paginate(15);
        return view('curso.administrar',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna la vista crear de cursos
        return view('curso.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //recibe los datos del curso
        $datosCurso = request()->except('_token');
        //Inserta los datos en la BD de tabla cursos
        Curso::insert($datosCurso);
        //regresa a la misma pagina con el mensaje de exito
        return redirect('curso/create')->with('mensaje','Curso creado con exito');   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_curso)
    {
        //Almacena el nuevo estado del curso Activo/Inactivo
        //$estado = request()->except(['_token','_method']);        
        $estado = request('estado');

        //Actualiza el estado en la BD
        Curso::where('id_curso', '=', $id_curso)->update(['estado' => $estado]);
        return redirect('curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
