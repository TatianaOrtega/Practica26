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
        $idUsuario = $datos['id_consumidor'];
        $idCurso = $datos['id_curso'];
        
        $consulta = "select count(*) cant
                    from suscripcions s
                    where s.id_curso in (select c.id_curso
                                        from cursos c
                                        where c.id_creador = (select cu.id_creador 
                                                            from cursos cu
                                                            where cu.id_curso =".$idCurso." )) 
                    and s.id_consumidor = ".$idUsuario;
            
        $resultado = DB::select($consulta);
        //$cant=0;
        foreach($resultado as $results){
            $cantidad = $results->cant;
        }

        //$cantidad = $resultado->cant;
        $mensaje = "Suscripcion realizada con exito";

        //Valida que no exista el registro en la tabla suscripcion
        if($cantidad == 0){
            //Inserta en BD la nueva suscripcion recibida
            Suscripcion::insert($datos);
        }
        //Caso contrario no registra la suscripcion y muestra mensaje
        else{
            $mensaje = "No puede suscribirse, ya existe una suscripcion con el mismo creador";
        }
        //Redirecciona al index con el mensaje de exito
        return redirect('suscripcion/'.$idUsuario )->with('mensaje',$mensaje);
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
        $consulta = "select c.nombre, u.nombres, c.id_curso,
                    ".$idUsuario." id_consumidor, 
                      nvl((select  s.id_suscripcion from suscripcions s
                           where s.id_curso = c.id_curso 
                           and s.estado = 'Suscrito'
                           and s.id_consumidor =".$idUsuario." ),'NA') id_suscripcion 
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
    public function destroy($id_suscripcion)
    {
        //Elimina el registro de la suscripcion
        Suscripcion::destroy($id_suscripcion);
        //
        //return redirect('suscripcion/'.$idUsuario )->with('mensaje','Suscripcion realizada con exito');
    }
}
