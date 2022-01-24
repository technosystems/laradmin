<div class="row">
  <div class="col-6">
    <label>Nombres: </label>
     <div class="form-group">
    <input type="text" class="form-control" value="{{ $element->name }}" autocomplete="off" name="name">
     </div>
  </div>
   <div class="col-6">
    <label>Apellidos: </label>
     <div class="form-group">
     <input type="text" class="form-control" value="{{ $element->lastname }}" autocomplete="off" name="lastname">
     </div>
  </div>
  <div class="col-4">
    <label>Correo: </label>
     <div class="form-group">
    <input type="email" class="form-control" value="{{ $element->email }}" autocomplete="off" name="email">
     </div>
  </div>
   <div class="col-4">
    <label>Usuario: </label>
     <div class="form-group">
     <input type="text" class="form-control" value="{{ $element->username }}" autocomplete="off" name="username">
     </div>
  </div>
  <div class="col-4">
    <label  for="role">Tipo de usuario</label>
    <div class="checkbox icheck">
      <label class="font-weight-bolder">
        <input type="radio" name="role" value="Usuario" checked> Usuario&nbsp;&nbsp;
        <input type="radio" name="role" value="Super Administrador"> Administrador
      </label>
    </div>
  </div>
  <div class="col-4">
    <label class="font-weight-bolder" for="password">Contraseña</label>
    <input type="password" style="font-size: 15px;" class="form-control" id="password" name="password" placeholder="Contraseña">
    <span class="missing_alert text-danger" id="password_alert"></span>
  </div>
  <div class="col-4">
     <label class="font-weight-bolder" for="password_confirmation">Confirmar Contraseña</label>
    <input type="password" style="font-size: 15px;" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Contraseña">
    <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
  </div>
 <div class="col-4">
    <label class="font-weight-bolder" for="status">Acceso al sistema</label>
    <div class="checkbox icheck">
      <label class="font-weight-bolder">
       <input type="radio" name="status" value="1" {{ $element->status == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
       <input type="radio" name="status" value="0" {{ $element->status == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
      </label>
    </div>
  </div>
</div>

@push('scripts')

   
@endpush
