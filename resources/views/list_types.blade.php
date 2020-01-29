@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Lista de los Tipos de Cacao</h1><br>
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
                <th scope="col">Nombre</th>
                <th scope="col">Nota</th>
                <th scope="col">Estado</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($types as $type)
              <tr>
                <th scope="row">{{ $type['id'] }}</>
                <td>{{ $type['name'] }}</td>
                <td>{{ $type['note'] }}</td>
                <td>
                    @if ( $type['isactive'] == true )
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
                <td>{{ $type['created_at'] }}</td>
                <td>{{ $type['updated_at'] }}</td>
                <td><a href="{{ URL::to( '/type/edit/'.$type['id'] ) }}" class="btn btn-warning">Editar</a></td>
                <td>
                  <form action="{{ action('TypeController@destroy', $type['id']) }}" method="POST">
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