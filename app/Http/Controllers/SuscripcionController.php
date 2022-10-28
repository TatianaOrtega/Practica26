<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra la vista de suscripcion   
        return view('curso.suscribir');
        
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
        //Obtiene los datos de la suscripcion exceptuando token 
        $datos = request()->except('_token');
        
        //Inserta en BD la nueva suscripcion recibida
        ///////////Hacer updte insert o cambira botones///////////
        Suscripcion::insert($datos);

        //Redirecciona al index con el mensaje de exito
        return redirect('suscripcion')->with('mensaje','Suscripcion realizada con exito');

        //return response()->json($datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function show($idUsuario)
    {
        //Recupera los cursos, creador, estado(suscripciones), id_consumidor
        //Para mostrarlos en la vista de suscripciones
        //Asi el consumidor puede verificar si esta suscrito
        $consulta = "SELECT c.nombre, u.nombres, c.id_curso id_curso,
                    ".$idUsuario." id_consumidor, 
                      nvl((select s.estado from suscripcions s
                           where s.id_curso = c.id_curso 
                           and s.id_consumidor =".$idUsuario." ),'NA') suscripcion 
                      FROM cursos c, usuarios u
                      WHERE c.id_creador = u.id_usuario
                       AND c.estado ='Activo'" ;

        //Realiza la consulta a la BD pasando todo el query
        $datos['suscripcion'] =  DB::select( DB::raw($consulta) );

        //retorna a la vista suscribir enviando el resultado de la consulta
        return view('curso.suscribir',$datos);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripcion $suscripcion)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripcion $suscripcion)
    {
        //
    }
}
