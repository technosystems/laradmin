@extends('layouts.admin')
@section('title','ROLES')
@section('page_title', 'Listado de Roles')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Roles</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Inicio</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#">Seguridad</a>
                      </li>
                      <li class="breadcrumb-item active">Roles
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
   <button type="button" class="btn blue darken-4 text-white btn-primary float-left btn-md mb-2"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Usuario" data-container="body" data-animation="true"></i>
            Nuevo Role
    </button>
  <div class="row">
      <div class="col-lg-12">
            <div class="card card-line-primary">
                  <div class="card-header">
                    <h4 class="card-title">Listado de roles</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="tableExport" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                           <th>#</th>
                            <th>Nombre completo</th>
                            <th>Usuarios que están usando el Role</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $element)
                              <tr class="row{{ $element->id }}">
                              <td>{{ $element->id }}</td>
                              <td>{{ $element->name }}</td>
                              <td>{{ $element->count_user }}</td>
                             
                              <td>
                                @can('EditarRole')
                                 <a class="btn btn-round blue darken-4" data-toggle="tooltip" data-placement="top"
                                title="Asignar permisos." href="{{ url('admin/permission', [$element->name]) }}"><i class="mdi mdi-lock text-center text-white"></i> </a>
                               @endcan
                                @can('EditarRole')
                                   <a class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $element->id }}"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                                title="Editar Role."></i></a>
                               @endcan
                                @can('EliminarRole')
                                   <a href="{{ url('/roles/borrar',$element->id) }}" class="btn btn-round red darken-4"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                                title="Eliminar role."></i></a>
                               @endcan
                                 
                              </td>
                              </tr>
                                @include('admin.roles.partials.modal.edit')

                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        @include('admin.roles.partials.modal.create')


@endsection