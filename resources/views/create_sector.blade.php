@extends('layout.base')

<!-- Specify content -->
@section('content')

<br><br>
<h1>Crear Sector</h1><br>
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
        <form method="POST" action="{{ URL::to( '/sectores/' ) }}">
                @csrf
                <div class="form-group">
                    <label class="text-uppercase" for="unidad_productiva_id" >Seleccione una categoria*: </label>
                    <select name="unidad_productiva_id" id="unidad_productiva_id" class="form-control">
                        @foreach ($unidades_productivas as $unidad_productiva)
                            @if ( old('unidad_productiva_id') == $unidad_productiva->id ) 
                                <option value="{{ $unidad_productiva->id }}" selected>{{ $unidad_productiva->name }}</option>
                            @else
                                <option value="{{ $unidad_productiva->id }}">{{ $unidad_productiva->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="type_id" >Seleccione el tipo de cacao*: </label>
                    <select name="type_id" id="type_id" class="form-control">
                        @foreach ($types as $type)
                            @if ( old('type_id') == $type->id ) 
                                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                            @else
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="name" >Nombre*: </label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" id="name" required autocomplete="name" autofocus>                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="address" >Direccion*: </label>
                    <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" type="text" name="address" id="address" required autocomplete="address" autofocus>                    
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="size" >Hectareas: </label>
                    <input class="form-control @error('size') is-invalid @enderror" value="{{ old('size') }}" type="number" name="size" id="size" autocomplete="size" autofocus>                    
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="lat" >Latitud: </label>
                    <input class="form-control @error('lat') is-invalid @enderror" value="{{ old('lat') }}" type="text" name="lat" id="lat" autocomplete="lat" autofocus>                    
                    @error('lat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="long" >Longitud: </label>
                    <input class="form-control @error('long') is-invalid @enderror" value="{{ old('long') }}" type="text" name="long" id="long" autocomplete="long" autofocus>                    
                    @error('long')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-uppercase" for="note" >Nota: </label>
                    <input class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" type="text" name="note" id="note" autocomplete="note" autofocus>                    
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
                
                            
                <button class="btn btn-primary" type="submit">Crear Sector</button>
            <a class="btn btn-dark" href="{{ URL::to( '/sectores' ) }}">Volver</a>
            </form>
        </div>
        
    </div>    
</div><br><br>

@endsection