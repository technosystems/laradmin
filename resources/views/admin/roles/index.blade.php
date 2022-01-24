@extends('layouts.admin')
@section('title', 'ROLES')

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row btn-group">
         <div class="col-12 text-right mb-1">
            @can('RegistrarRole')
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Añadir nuevo rol</a>
            @endcan
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-line-primary">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
            <p class="card-category">Lista de roles registrados en la base de datos</p>
          </div>
          <div class="card-body">
          
            <div class="table-responsive">
              <table id="tableExport" class="display table table-striped table-hover" >
                <thead class="text-primary">
                  <th> ID </th>
                  <th> Nombre </th>
                  <th> Guard </th>
                  <th> Fecha de creación </th>
                  <th> Permisos </th>
                  <th class="text-right"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td class="text-primary">{{ $role->created_at->toFormattedDateString() }}</td>
                    <td>
                      @forelse ($role->permissions as $permission)
                          <span class="badge bg-info">{{ $permission->name }}</span>
                      @empty
                          <span class="badge bg-danger">Sin permisos asignados</span>
                      @endforelse
                    </td>
                    <td class="td-actions text-right">
                    @can('VerRole')
                      <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-round btn-info"> <i
                          class="mdi mdi-face"></i> </a>
                    @endcan
                    @can('EditarRole')
                      <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-round btn-success"> <i
                          class="mdi mdi-pencil"></i> </a>
                    @endcan
                    @can('EliminarRole')
                      <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post"
                        onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-round btn-danger">
                          <i class="mdi mdi-delete"></i>
                        </button>
                      </form>
                    @endcan
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
           
          </div>
          <!--End footer-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
