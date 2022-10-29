    
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

<div class="container">
<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Suscripcion de Cursos Activos</h3>
@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Creador</th>
            <th>Curso</th>
            <th>Suscripcion</th>  
            <th>Acciones</th> 
                                 
        </tr>
    </thead>
    <tbody>
        @php $i=1; @endphp
        @foreach($suscripcion as $suscribir)

        @php $estado = "No tiene " @endphp
            @if($suscribir->id_suscripcion <> 'NA')
            @php $estado = "Suscrito" @endphp
            @endif
        
        <tr><form method="post" action="{{ url('/suscripcion') }}">
            @csrf
            <td>{{ $i++ }}</td>
            <td>{{ $suscribir->nombres }}</td>
            <td>{{ $suscribir->nombre }}</td>           
            <td>{{ $estado }}</td>  
            <td>
                @if($estado == "Suscrito")
                <label>Suscrito</label>
                @else
                
                <button type="submit" class="btn btn-primary" value="Suscrito" name="estado">Suscribirse</button>

                @endif
                <input type="hidden" id="id_curso" name="id_curso" value="{{ $suscribir->id_curso}}">
                <input type="hidden" id="id_consumidor" name="id_consumidor" value="{{ $suscribir->id_consumidor}}">              
            </td>   
              </form>
        </tr> 
        @endforeach       
    </tbody>
</table>

</div>