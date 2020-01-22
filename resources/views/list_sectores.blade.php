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
                <th>Unidad Productiva</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Nota</th>
                <th>Estado</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sectores as $sector)
              <tr>
                <td>{{ $sector['id'] }}</td>
                <td>{{ $sector['unidadproductiva']['name'] }}</td>
                <td>{{ $sector['name'] }}</td>
                <td>{{ $sector['address'] }}</td>
                <td>{{ $sector['lat'] }}</td>
                <td>{{ $sector['long'] }}</td>
                <td>{{ $sector['note'] }}</td>
                <td>
                    @if ( $sector['isactive'] == true )
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
                <td>{{ $sector['created_at'] }}</td>
                <td>{{ $sector['updated_at'] }}</td>
                <td><a href="{{ URL::to( '/sector/edit/'.$sector['id'] ) }}" class="btn btn-warning">Editar</a></td>
                <td>
                  <form action="{{ action('SectorController@destroy', $sector['id']) }}" method="POST">
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