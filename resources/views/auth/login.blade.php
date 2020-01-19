@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Iniciar Sesión</h2>
		    <form class="login-form" method="POST" action="{{ route('login') }}">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">Correo:</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Escriba su correo" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-uppercase">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Escriba su contraseña"  required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <small>Recordarme</small>
                    </label>
                    <button type="submit" class="btn btn-login float-right">Acceder</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Recuperar contraseña
                        </a>
                    @endif
                </div>
                
            </form>
            <div class="copy-text">Desarrollado <i class="fa fa-heart"></i> por <a href="http://alt-berto.com">alt-berto.com</a></div>
        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ asset('img/13.JPG') }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<div class="banner-text">
                                <h2>This is First Slide</h2>
                                <p>Lorem ipsum dolor sit amet, </p>
                            </div>-->	
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('img/9.JPG') }}" alt="Second slide">                        
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('img/15.JPG') }}" alt="Third slide">
                    </div>
                </div>	   
		    
		    </div>
	    </div>
    </div>
</div>

@endsection
