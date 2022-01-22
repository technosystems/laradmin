@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')



@section('content')
   <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Usuarios</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Inicio</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#">Seguridad</a>
                      </li>
                      <li class="breadcrumb-item active">Usuarios
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
      <div>
        <div class="col-md-6">
          <div class="btn-group">
           
           @can('RegistrarUsuario')
            <a href="{{ url('admin/usuario/create') }}" class="btn blue darken-3 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>  
           @endcan
          </div>
        </div>
      <br>
      
        <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header">
              <h5 >Listado de usuarios</h5>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                     
                <table  class="display table table-striped " style="width:100%" id="tableExport">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Género</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr class="row{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->display_name }}</td>
                    <td>{{ $user->username }}</td>
               
                      
                       @if ($user->genero == 'F')
                      <td><i class="mdi mdi-human-female fa-3x pink-text"></i></td>
                      @else
                      <td><i class="mdi mdi-human-male fa-3x blue-text "></i></td>
                      @endif


                    <td>{!! $user->hasRole('Administrador') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                    <td>{{ $user->email  }}</td>
                    <td>
                      @if ($user->status == 1)
                         <span class="badge text-white green">Activo</span>
                      @else
                         <span class="badge text-white red">Inactivo</span>
                      @endif
                    </td>
                    <td>
                       @can('VerUsuario')
                       <a class="btn btn-round blue darken-4" href="{{ url('admin/usuario', [$user->id]) }}"><i class="mdi mdi-face text-center" style="color: white;"></i> </a>
                       @endcan
                      @can('EditarUsuario')
                       <a class="btn btn-round blue darken-4" href="{{ url('admin/usuario', [$user->id,'edit']) }}"><i class="mdi mdi-pencil text-center" style="color: white;"></i> </a>
                     @endcan
                       
                    </td>
                    </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
      </div>
      
   



@endsection

