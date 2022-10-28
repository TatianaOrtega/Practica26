<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    //
    public function index()
    {
        
        return view('usuario.login');
    }

    public function store(Request $request)
    {
        //Recupera los datos quitando el token
        $usuario = request()->except('_token');

        //Almacena los valores recibidos
        $email = $usuario ['email'];
        $contrasena = $usuario ['contrasena'];
        
        //Obtiene los datos del usuario en la BD
        $datos = Usuario::where('email', $email )
                        ->where('contrasena', $contrasena )
                        ->first();

        //Si el usuario no existe regresa al login
        if($datos == null){///////////ENVIAR MENSAJE USUARIO INCORRECTO////////////
            return view('usuario.login');
        }
        //Almacena el id y el tipo de usuario
        $idUsuario = $datos->id_usuario;
        $tipoUsuario = $datos->tipo_usuario;
        
        //Valida el tipo de usuario para continuar a la vista
        if($tipoUsuario == 'ADMIN' ){
            //Vista del administrador, registro usuario
            return redirect('registro');
        }
        //Usuario creador
        elseif($tipoUsuario == 'CREAD' ){
            //Vista crear curso
            //return view('curso.crear', compact('datos'))
            return redirect('curso/create')->with('id', $idUsuario);
        }
        //Usuario consumidor
        elseif($tipoUsuario == 'CONSU' ){
            //vista de suscripcion
            return redirect('suscripcion/'.$idUsuario);
        }
        //Por default
        else{
            //regresa al login
            return view('usuario.login');
        }
    }

}
