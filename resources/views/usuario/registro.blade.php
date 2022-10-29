
@extends('layouts.app')
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand">Aplicativo Suscripciones</a>    
    
        <ul class="nav justify-content-end" >
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registro') }}">Registrar </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('curso')}}">Administrar</a>
        </li>   
        </ul>        
</nav>
 <div class="row justify-content-end">
    <div class="col-2">
    <form method="post" action="{{ url('/') }}">
        @csrf
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</button>
    </form>
</div>
</div>
@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
<div class="col-lg-3 m-auto">
<form method="post" action="{{url('/registro')}}">
  @csrf
<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registrar Usuario</h3>
  <div class="form-group">   
    <label for="nombres">Nombre y Apellido</label>
    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres"><br>    
  </div>
  <div class="form-group">   
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email"><br>    
  </div>
  <div class="form-group">
    <label for="contrasena">Contraseña</label>
    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña"><br>
  </div>
  <div class="form-group">
    <label for="tipo_usuario">Tipo usuario</label>    
    <select class="form-select" name="tipo_usuario" id="tipo_usuario">        
        <option value="CREAD">CREADOR</option>
        <option value="CONSU">CONSUMIDOR</option>        
      </select>
  </div>
    <br>    
    <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrar</button>
</form>
</div>