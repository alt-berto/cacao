@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Crear Unidad Productiva</h1><br>
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
        <form method="POST" action="{{ URL::to('/unidades/productivas/') }}">                
                @csrf
                <div class="form-group">
                    <label class="text-uppercase" for="name" >Nombre: </label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" id="name" required autocomplete="name" autofocus>                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="address" >Direccion: </label>
                    <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" type="text" name="address" id="address" required autocomplete="address" autofocus>                    
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="lat" >Latitud: </label>
                    <input class="form-control @error('lat') is-invalid @enderror" value="{{ old('lat') }}" type="text" name="lat" id="lat" required autocomplete="lat" autofocus>                    
                    @error('lat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="long" >Longitud: </label>
                    <input class="form-control @error('long') is-invalid @enderror" value="{{ old('long') }}" type="text" name="long" id="long" required autocomplete="long" autofocus>                    
                    @error('long')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="note" >Nota: </label>
                    <input class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" type="text" name="note" id="note" required autocomplete="note" autofocus>                    
                    @error('note')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="isactive" >Estado: </label>
                    <select name="isactive" id="isactive" class="form-control">                        
                        @if ( old('isactive') == true ) 
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
                
                            
                <button class="btn btn-primary" type="submit">Agregar Unidad Productiva</button>
            <a class="btn btn-dark" href="{{ URL::to( '/unidades/productivas' ) }}">Volver</a>
            </form>
        </div>
        
    </div>    
</div><br><br>

@endsection