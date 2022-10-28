
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