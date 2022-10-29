
@extends('layouts.app')
<br> 
 <div class="row justify-content-end">
    <div class="col-2">
    <form method="post" action="{{ url('/') }}">
        @csrf
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</button>
    </form>
</div>

</div>
<div class="col-lg-3 m-auto">
<form method="post" action="{{url('/curso')}}">
  @csrf
  @if( Session::has('mensaje'))
  {{ Session::get('mensaje')}}
  @endif
<br> 
<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Crear Curso</h3>
  <div class="form-group">   
    <label for="nombre">Nombre Curso</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del curso"><br>    
  </div>
  <div class="form-group">   
    <label for="estado">Estado</label>
    <select class="form-select" name="estado" id="estado">
        <option value="EN CONSTRUCCION">En construccion</option>        
      </select>
  </div>
  <input type="hidden" id="id_creador" name="id_creador" value ="{{ Session::get('id')}}"><br>  
    <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Guardar</button>
</form>
<div class="col-lg-3 m-auto">