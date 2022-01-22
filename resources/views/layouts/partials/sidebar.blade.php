 <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none ">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="{{ url('admin/dashboard') }}">
                            
                           <img src="{{ asset('images/logo/logo_original.png') }}" class=" animate__animated animate__bounce animate__slower-1s" height="60">

                            
                        
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    @php
                          $mytime = Carbon\Carbon::now('America/Caracas');
                          $fecha=$mytime->format('Y-m-d');

                         $today = getdate();
                         $data_month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                        //$config = \DB::table('configuraciones')->first();
                        $current_month = $today['mon'];
                        $current_year = $today['year'];
                        $mes_actual =$data_month[$current_month - 1];
                        //dd($mes_actual);

                        $nombre_dia = date('w');
                        switch($nombre_dia)
                        {
                            case 1: $nombre_dia="Lunes";
                            break;
                            case 2: $nombre_dia="Martes";
                            break;
                            case 3: $nombre_dia="Miercoles";
                            break;
                            case 4: $nombre_dia="Jueves";
                            break;
                            case 5: $nombre_dia="Viernes";
                            break;
                            case 6: $nombre_dia="Sabado";
                            break;
                        }
                    
                    @endphp 
                   <div class="date">
                    <span id="weekDay" class="weekDay">
                        {{ $nombre_dia }}
                    </span>, 
                    <span id="day" class="day"></span> de
                    <span id="month" class="month">
                        {{ $mes_actual }}
                    </span> del
                    <span id="year" class="year">
                        {{ date('Y') }}
                    </span> ,
                    <span id="hours" class="hours"></span> :
                    <span id="minutes" class="minutes"></span> :
                    <span id="seconds" class="seconds"></span>
                </div>
                </ul>
              
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ \Auth::user()->display_name }}</span>
                            @if (Auth::user()->hasRole('Administrador'))
                                <span class="user-status">Administrador</span>
                             @else
                                <span class="user-status">Usuario</span>
                            @endif
                        </div><span class="avatar"><img class="round" src="{{ asset('images/user/'.auth()->user()->photo) }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{ url('admin/usuario',auth()->user()->id) }}"><i class="mr-50" data-feather="user"></i> Perfil</a><div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="me-50" data-feather="log-out"></i>   {{ __('Salir') }}
                        </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->