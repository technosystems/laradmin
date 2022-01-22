@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')
<!-- Medal Card -->
      <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal ">
                <div class="card-body">
                    <h5>Bienvenidos {{ Auth::user()->name }}  🎉 !</h5>
                    <p class="card-text font-small-3">Gracias por preferirnos</p>
                    <img src="{{ asset('/images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic" />
                </div>
            </div>
        </div>
      <!--/ Medal Card -->
     <div class="col-xl-8 col-md-6 col-12 ">
        <div class="card card-statistics card-top-primary card-bottom-primary card-start-primary line-end-primary">
            <div class="card-header">
                <h4 class="card-title">Estadísticas</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">{{ date('d/m/Y') }}</p>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-face avatar-icon fa-2x mb-1"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ App\Models\User::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Usuarios</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i class="mdi mdi-shield avatar-icon fa-2x mb-1"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ Spatie\Permission\Models\Role::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Roles</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-warning me-2">
                                <div class="avatar-content">
                                    <i data-feather="lock" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ Spatie\Permission\Models\Permission::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Permisos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i data-feather="file" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto">
                                <h4 class="fw-bolder mb-0">{{ App\Models\Log\LogSistema::count() }}</h4>
                                <p class="card-text font-small-3 mb-0">Historial</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="col-lg-4 col-md-6 col-12 animate__animated animate__fadeIn animate__slower-1s">
      <div class="card card-developer-meetup card-top-primary card-bottom-primary card-start-primary line-end-primary">
          <div class="meetup-img-wrapper rounded-top text-center">
              <img src="{{ asset('images/illustration/email.svg') }}" alt="Meeting Pic" height="170" />
          </div>
          <div class="card-body">
              <div class="meetup-header d-flex align-items-center">
                  <div class="meetup-day">
                      <h6 class="mb-0 text-uppercase">{{ date('M') }}</h6>
                      <h3 class="mb-0">{{ date('d') }}</h3>
                  </div>
                  <div class="my-auto">
                      <h4 class="card-title mb-25">Listado de usuarios</h4>
                      <p class="card-text mb-0">Últimos 5 usuarios registrados</p>
                  </div>
              </div>
              @php
                $user = App\Models\User::take(5)->get()
              @endphp
              <div class="mt-0">
                 
                 <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                           
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    @foreach ($user as $element)
                                    <tbody>
                                      <tr>
                                        <td>{{ $element->id }}</td>
                                        <td>{{ $element->display_name }}</td>
                                        <td>
                                        @if ($element->status == 1)
                                          <span class="badge text-white green">Activo </span>
                                        @else
                                          <span class="badge text-white red">Inactivo </span>
                                        @endif
                                      </td>
                                      </tr>
                                    </tbody>
                                     @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
         </div>
       </div>
       <div class="col-lg-8 col-md-6 col-12 ">
        <div class="card">

  
            <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                <div class="header-left">
                    <h4 class="card-title">Acceso al sistema urante el año {{ date('Y') }}</h4>
                </div>
                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                    <i data-feather="calendar"></i>
                    <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0" disabled value="{{ date('d/m/Y') }}" />
                </div>
            </div>
            <div class="card-body">
                <canvas class="chartjs" data-height="400" id="employee"></canvas>
            </div>
   
                     
        </div>
       </div>
     </div>

@endsection
@push('scripts')
    
    {{-- Create the chart with javascript using canvas --}}
    <script>
        // Get Canvas element by its id
        employee_chart = document.getElementById('employee').getContext('2d');
        chart = new Chart(employee_chart,{
            type:'bar',
            data:{
                labels:[
                    /*
                        this is blade templating.
                        we are getting the date by specifying the submonth
                     */
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre',
                    ],
                datasets:[{
                    label:'Acceso al sistema urante el año '+{{ date('Y') }},
                    data:[

                        '{{$mes_1}}',
                        '{{$mes_2}}',
                        '{{$mes_3}}',
                        '{{$mes_4}}',
                        '{{$mes_5}}',
                        '{{$mes_6}}',
                        '{{$mes_7}}',
                        '{{$mes_8}}',
                        '{{$mes_9}}',
                        '{{$mes_10}}',
                        '{{$mes_11}}',
                        '{{$mes_12}}',

                    ],
                    backgroundColor: [
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)',
                        'rgba(178,235,242 ,1)'

                    ],
                    borderColor: [
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                        'rgba(0,150,136 ,1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endpush