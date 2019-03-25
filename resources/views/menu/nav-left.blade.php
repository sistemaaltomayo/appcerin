<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Inicio</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menú</li>
            <li class="active"><a href="{{ url('/bienvenido') }}"><i class="icon mdi mdi-home"></i><span>Inicio</span></a>
            </li>
            @foreach(Session::get('listamenu') as $grupo)

                @if($grupo->orden == 100)
                    <li class="divider">Reportes</li>
                @endif
            
                <li class="parent"><a href="#"><i class="icon mdi {{$grupo->icono}}"></i><span>{{$grupo->nombre}}</span></a>
                  <ul class="sub-mensu">
                    @foreach($grupo->opcion as $opcion)
                      <li>
                        <a href="{{ url('/'.$opcion->pagina.'/'.Hashids::encode(substr($opcion->id, -12))) }}">{{$opcion->nombre}}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>

            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>