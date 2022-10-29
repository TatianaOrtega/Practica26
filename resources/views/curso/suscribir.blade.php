    Suscripcion de Cursos Activos

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
                <label>Activo</label>
                @else
                
                <button type="submit"  value="Suscrito" name="estado">Suscribirse</button>

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