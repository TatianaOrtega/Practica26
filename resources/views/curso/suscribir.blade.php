    Suscripcion de Cursos Activos

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif

<div class="container">
<form method="post" action="{{ url('/suscripcion') }}">
@csrf
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Curso</th>
            <th>Creador</th>
            <th>Estado Suscripcion</th>  
            <th>Acciones</th> 
                                 
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach($suscripcion as $suscribir)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $suscribir->nombre }}</td>
            <td>{{ $suscribir->nombres }}</td>           
            <td>{{ $suscribir->suscripcion}}</td>  
            <td>                 
                <button type="submit"  value="Suscrito" name="estado">Suscribir</button>                
                <form method="post" action="">
                    @csrf
                    <button type="submit"  value="Eliminar" name="estado">Eliminar</button>
                </form>
                <input type="hidden" id="id_curso" name="id_curso" value="{{ $suscribir->id_curso}}"> 
                <input type="hidden" id="id_consumidor" name="id_consumidor" value="{{ $suscribir->id_consumidor}}">              
            </td>   
              
        </tr> 
        @endforeach       
    </tbody>
</table>
</form>
</div>