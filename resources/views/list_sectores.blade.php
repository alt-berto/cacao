@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Lista de Sectores</h1><br>
<div class="card">
    <div class="card-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <div class="table-responsive">
          <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Unidad Productiva</th>
                  <th scope="col">Tipo Cacao</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Hectareas</th>
                  {{--<th scope="col">Latitud</th>
                  <th scope="col">Longitud</th>--}}
                  <th scope="col">Nota</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Creado</th>
                  <th scope="col">Modificado</th>
                  <th scope="col" colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sectores as $sector)
                <tr>
                  <th scope="row">{{ $sector['id'] }}</th>
                  <td>{{ $sector['unidadproductiva']['name'] }}</td>
                  <td>{{ $sector['type']['name'] }}</td>
                  <td>{{ $sector['name'] }}</td>
                  <td>{{ $sector['address'] }}</td>
                  <td>{{ $sector['size'] }}</td>
                  {{--<td>{{ $sector['lat'] }}</td>
                  <td>{{ $sector['long'] }}</td>--}}
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
    </div>    
</div><br><br>

@endsection