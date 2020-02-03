@section('header')

<!-- Begin header -->
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <a class="navbar-brand" href="{{ URL::to('/') }}">
      <img src="{{ asset('img/logocacao-blanco2.png') }}" width="175" height="70" alt="logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a id="navbarDropdown" class="nav-link" href="{{ URL::to('/') }}" role="button" v-pre>
          Procesos <span class="caret"></span>
        </a>
    </li>
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Lotes <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ URL::to('/lotes') }}" >
                Listar Lotes
            </a>  
            <a class="dropdown-item" href="{{ URL::to('/lote/create') }}" >
              Agregar Lotes
          </a>            
        </div>
      </li>      
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Costos <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ URL::to('/costos') }}" >
              Listar Costos
          </a>  
          <a class="dropdown-item" href="{{ URL::to('/costo/create') }}" >
            Agregar Costo
          </a>            
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Costos por Periodo <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ URL::to('/costo/periodos/') }}" >
              Listar Costos por Periodo
          </a>  
          <a class="dropdown-item" href="{{ URL::to('/costo/periodo/create') }}" >
            Agregar Costo por Periodo
          </a>            
        </div>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Unidades productivas <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ URL::to('/unidades/productivas') }}" >
              Listar unidades productivas
          </a>  
          <a class="dropdown-item" href="{{ URL::to('/unidad/productiva/create') }}" >
            Agregar unidad productiva
        </a>            
      </div>
    </li>
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Sectores <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ URL::to('/sectores') }}" >
            Listar sectores de las unidades productivas
        </a>  
        <a class="dropdown-item" href="{{ URL::to('/sector/create') }}" >
          Agregar un sector
      </a>            
    </div>
  </li>
  <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      Tipos de cacao <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ URL::to('/types') }}" >
          Listar Tipos de Cacao
      </a>  
      <a class="dropdown-item" href="{{ URL::to('/type/create') }}" >
        Agregar un Nuevo Tipo de Cacao
      </a>            
    </div>
  </li>
  <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Reportes <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ URL::to('/') }}" >
            Reporte #1
        </a>  
          
    </div>
  </li>
    <li class="nav-item">
        <a class="nav-link" href="#"> | </a>
    </li>
      <!-- Authentication Links -->
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->username }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
    </ul>
  </div>
</nav>