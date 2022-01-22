<!-- Modal -->
  <div class="modal fade" id="exampleModalCenter{{ $element->id }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar datos del role</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               {!! Form::model($element, ['route' => ['admin.roles.update',$element->id],'method' => 'PUT']) !!}
              @include('admin.roles.partials.input.form')
              <br><br>
              <button type="submit" class="btn blue darken-4 text-white form-control">Guardar cambios</button>
               {!! Form::close()!!}
            </div>
           
          </div>
      </div>
  </div>