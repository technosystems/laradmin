@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('content') 
<div id="user-profile">
  <!-- profile header -->
  <div class="row">
      <div class="col-12">
          <div class="card profile-header mb-2">
              <!-- profile cover photo -->
              <img class="card-img-top" src="{{ asset('images/profile/user-uploads/timeline.jpg') }}" alt="User Profile Image" />
              <!--/ profile cover photo -->

              <div class="position-relative">
                  <!-- profile picture -->
                  <div class="profile-img-container d-flex align-items-center">
                      <div class="profile-img">
                          <img src="{{ asset('images/user/'.$user->photo) }}" class="rounded img-fluid" alt="Card image" />
                      </div>
                      <!-- profile title -->
                      <div class="profile-title ms-3">
                          <h2 class="text-white">{{ $user->display_name }}</h2>
                          <p class="text-white">
                            @if ($user->hasRole('Administrador'))
                              <span>Administrador</span>
                              @else
                              <span>Usuario</span>
                            @endif
                          </p>
                      </div>
                  </div>
              </div>

              <!-- tabs pill -->
              <div class="profile-header-nav">
                  <!-- navbar -->
                  <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                      <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <i data-feather="align-justify" class="font-medium-5"></i>
                      </button>

                      <!-- collapse  -->
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                              <ul class="nav nav-pills mb-0">
                                  <li class="nav-item">
                                     
                                  </li>
                                  <li class="nav-item">
                                     
                                  </li>
                                  <li class="nav-item">
                                      
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link fw-bold" href="#">
                                         
                                      </a>
                                  </li>
                              </ul>
                              <!-- edit button -->
                              <a href="{{ url('admin/usuario', [$user->id, 'edit']) }}" class="btn btn-primary">
                                  <i class="d-block d-md-none fas fa-edit"></i>
                                  <span class="fw-bold d-none d-md-block">Editar</span>
                              </a>
                          </div>
                      </div>
                      <!--/ collapse  -->
                  </nav>
                  <!--/ navbar -->
              </div>

          </div>
     <section id="profile-info">
        <div class="row">
           <!-- left profile info section -->
         <div class="col-lg-3">
          <!-- about -->
            <div class="card">
              <div class="card-body">
                
                  <div class="mt-1">
                      <h5 class="mb-75">Registrado:</h5>
                      <p class="card-text">{{ $user->created_at }}</p>
                    </div>
                
                  <div class="mt-1">
                      <h5 class="mb-75">Correo:</h5>
                      <p class="card-text">{{ $user->email }}</p>
                  </div>
                  <div class="mt-1">
                      <h5 class="mb-50">Usuario:</h5>
                      <p class="card-text mb-0">{{ $user->username }}</p>
                  </div>
              </div>
              </div>
             <!--/ about -->
          </div>
           <!-- center profile info section -->
            <div class="col-lg-9 col-12 order-1 order-lg-2">
              @php
                $logins = App\Models\Login::where('user_id',$user->id)->get()
              @endphp
             <div class="card">
               <div class="card-body table-responsive">
                   <table class="table " id="tableExport">
                     <thead>
                    <tr>
                    <th>#</th>
                     <th>Usuario</th>
                    <th>Inicio</th>
                    <th>Cierre</th>
                    <th>IP</th>
                    <th>Cliente</th>
                    
                    <tbody>
                    @foreach ($logins as $login)
                     <tr class="row{{ $login->id }}">
                      <td>{{ $login->id }}</td>
                      <td>{{ $login->user->display_name }}</td>
                      <td>{{ $login->login_at  }}</td>
                      <td>{{ $login->logout_at }}</td>
                      <td>{{ $login->ip_address }}</td>
                      <td>{{ $login->user_agent }}</td>
                      </tr>
                        @endforeach
                    </tbody>
                   
                </table>
             </div>
           </div>
         </div>
       </div>
            
      </section>
      </div>
  </div>
  <!--/ profile header -->
@endsection
