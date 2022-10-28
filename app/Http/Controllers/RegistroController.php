<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class RegistroController extends Controller
{
    //

    public function index()
    {
        
        return view('usuario.registro');
    }

    public function store(Request $request)
    {
        $datosUsuario = request()->except('_token');
        //return response()->json($datosUsuario);
        Usuario::insert($datosUsuario);
        return redirect('registro')->with('mensaje','Usuario agregado con exito');

    }
}
