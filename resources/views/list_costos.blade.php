@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Lista de Costos</h1><br>
<div class="card">
    <div class="card-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nota</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($costos as $costo)
              <tr>
                <td>{{ $costo['id'] }}</td>
                <td>{{ $costo['name'] }}</td>
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
                <td><a href="{{ URL::to( '/costo/edit/'.$costo['id'] ) }}" class="btn btn-warning">Editar</a></td>
                <td>
                  <form action="{{ action('CostosController@destroy', $costo['id']) }}" method="POST">
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
</div><br><br>

@endsection