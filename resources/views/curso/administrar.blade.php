<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand">Aplicativo Suscripciones</a>    
    
        <ul class="nav justify-content-end" >
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registro')}}">Registrar </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('curso')}}">Administrar</a>
        </li>   
        </ul>
        
    </nav>
Usuarios creadores y sus cursos

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<div class="container">
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Creador</th>
            <th>Curso</th>
            <th>Estado</th>
            <th>Acciones</th>            
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach($cursos as $curso)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $curso->creador->nombres }}</td>
            <td>{{ $curso->nombre }}</td>
            <td>{{ $curso->estado }}</td>
            <td>
                <form method="post" action="{{ url('/curso/'.$curso->id_curso) }}">
                    @csrf
                    {{ method_field('PATCH')}}
                    <button type="submit"  value="Activo" name="estado">Activar</button>
                    <button type="submit"  value="Inactivo" name="estado">Inactivar</button>
                </form>
            </td>        
        </tr> 
        @endforeach       
    </tbody>
</table>
</div>

