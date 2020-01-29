@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Modificar Costo</h1><br>
<div class="card">
    <div class="card-body">
        <div class="sm">            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif            
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif
        <form method="POST" action="{{ URL::to('/costos/'.$costo->id ) }}">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                    <label class="text-uppercase" for="name" >Nombre*: </label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ $costo->name }}" type="text" name="name" id="name" required autocomplete="name" autofocus>                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="note" >Nota: </label>
                    <input class="form-control @error('note') is-invalid @enderror" value="{{ $costo->note }}" type="text" name="note" id="note" autocomplete="note" autofocus>                    
                    @error('note')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="isactive" >Estado: </label>
                    <select name="isactive" id="isactive" class="form-control">                        
                        @if ( $costo->isactive == true ) 
                            <option value="1" selected> Activo </option>
                            <option value="0"> Inactivo </option>
                        @else
                            <option value="1"> Activo </option>
                            <option value="0" selected> Inactivo </option>
                        @endif                        
                    </select>
                    @error('isactive')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                            
                <button class="btn btn-primary" type="submit">Actualizar Costo</button>
            <a class="btn btn-dark" href="{{ URL::to( '/costos' ) }}">Volver</a>
            </form>
        </div>
        
    </div>    
</div><br><br>

@endsection