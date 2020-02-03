@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Lista de Costos por Periodos</h1><br>
<div class="card">
    <div class="card-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        {{ $costos_periodos }}
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Costo</th>
                <th scope="col">Fecha Inicio</th>
                <th scope="col">Fecha Fin</th>
                <th scope="col">Total</th>
                <th scope="col">Nota</th>
                <th scope="col">Estado</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($costos_periodos as $costo)
              <tr>
                <th scope="row">{{ $costo['id'] }}</>
                <td>{{ $costo['costo']['name'] }}</td>
                <td>{{ $costo['fecha_inicio'] }}</td>
                <td>{{ $costo['fecha_fin'] }}</td>
                <td>{{ $costo['amount'] }}</td>
                <td>{{ $costo['note'] }}</td>
                <td>
                    @if ( $costo['isactive'] == true )
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
                <td>{{ $costo['created_at'] }}</td>
                <td>{{ $costo['updated_at'] }}</td>
                <td><a href="{{ URL::to( '/costo/periodo/edit/'.$costo['id'] ) }}" class="btn btn-warning">Editar</a></td>
                <td>
                  <form action="{{ action('CostosPeriodosController@destroy', $costo['id']) }}" method="POST">
                    {{ csrf_field(  ) }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
    </div>    
</div><br><br>

@endsection