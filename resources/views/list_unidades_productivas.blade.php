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
              @foreach($unidades_productivas as $unidad_productiva)
              <tr>
                <td>{{ $unidad_productiva['id'] }}</td>
                <td>{{ $unidad_productiva['name'] }}</td>
                <td>{{ $unidad_productiva['address'] }}</td>
                <td>{{ $unidad_productiva['lat'] }}</td>
                <td>{{ $unidad_productiva['long'] }}</td>
                <td>{{ $unidad_productiva['note'] }}</td>
                <td>
                    @if ( $unidad_productiva['isactive'] == true )
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
                <td>{{ $unidad_productiva['created_at'] }}</td>
                <td>{{ $unidad_productiva['updated_at'] }}</td>
                <td><a href="{{ URL::to( '/unidad/productiva/edit/'.$unidad_productiva['id'] ) }}" class="btn btn-warning">Editar</a></td>
                <td>
                  <form action="{{ action('UnidadProductivaController@destroy', $unidad_productiva['id']) }}" method="POST">
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