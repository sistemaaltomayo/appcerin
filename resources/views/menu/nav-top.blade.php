
<nav class="navbar navbar-default navbar-fixed-top be-top-header">
  <div class="container-fluid">
    <div class="navbar-header"><a href="{{ url('/bienvenido') }}" class="navbar-brand"></a></div>
    <div class="be-right-navbar">
      <ul class="nav navbar-nav navbar-right be-user-nav">
        <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('public/img/avatar.png') }}" alt="Avatar"><span class="user-name">{{Session::get('usuario')->nombre}}</span></a>
          <ul role="menu" class="dropdown-menu">
            <li>
              <div class="user-info">
                <div class="user-name">{{Session::get('usuario')->nombre}}</div>
                <div class="user-position online">disponible</div>
              </div>
            </li>
            <li><a href="#"><span class="icon mdi mdi-settings"></span> Configuraciones</a></li>
            <li><a href="{{ url('/cerrarsession') }}"><span class="icon mdi mdi-power"></span> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      <div class="panel-heading" align="center">
        <h3 class="media-heading">
            <div class="ubicacion">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                Cerin
            </div>
        </h3>  
      </div>

    </div>
  </div>
</nav>