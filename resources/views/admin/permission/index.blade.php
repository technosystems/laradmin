@extends('layouts.admin')
@section('title','PERMISOS')
@section('page_title', 'Listado de Permisos')
@section('content')
<div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
          <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Permisos</h2>
              <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Inicio</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#">Seguridad</a>
                      </li>
                      <li class="breadcrumb-item active">Permisos
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
   <button type="button" class="btn blue darken-4 text-white btn-primary float-left btn-md mb-2"data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fas fa-plus-square"  data-bs-toggle="tooltip" data-bs-placement="top" title="Crear nuevo Usuario" data-container="body" data-animation="true"></i>
            Nuevo Permiso
    </button>
  <div class="row">
      <div class="col-lg-12">
            <div class="card card-line-primary">
                  <div class="card-header">
                    <h4 class="card-title">Listado de permisos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="tableExport" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                           <th>#</th>
                            <th>Nombre completo</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($permissions as $element)
                              <tr class="row{{ $element->id }}">
                              <td>{{ $element->id }}</td>
                              <td>{{ $element->name }}</td>
                              <td>
                                @can('EditarPermisos')
                                   <a class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $element->id }}"><i class="mdi mdi-pencil mt-2 text-white" data-bs-toggle="tooltip" data-placement="top"
                                title="Editar Permiso."></i></a>
                               @endcan
                                @can('EliminarPermisos')
                                  <form action="{{ route('admin.permission.destroy', $element->id) }}" method="POST"
                                  style="display: inline-block;" onsubmit="return confirm('¿Desea eliminar?')">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-round btn-danger" type="submit" >
                                   <i class="mdi mdi-delete mt-2 text-white" data-bs-toggle="tooltip" data-placement="top"
                                title="Eliminar Permiso."></i>
                                  </button>
                                </form>
                               @endcan
                                 
                              </td>
                              </tr>
                                @include('admin.permission.partials.modal.edit')

                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        @include('admin.permission.partials.modal.create')


@endsection