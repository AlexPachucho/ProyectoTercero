<div class="container">
    <div class="mb-3">
        <label for="rol_id" class="form-label">Escoja un rol</label>
        <select class="form-select" name="rol_id">
            @foreach($roles as $r)
            <option value="{{ $r->rol_id }}" @if(isset($users) && $users->rol_id == $r->rol_id) selected @endif>
                {{ $r->rol_descripcion }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" value="{{ isset($users)?$users->name:''}}" id="name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="usu_nombres" class="form-label">Nombres y Apellidos</label>
        <input type="text" class="form-control" value="{{ isset($users)?$users->usu_nombres:''}}" id="usu_nombres" name="usu_nombres" required>
    </div>

    <div class="mb-3">
        <label for="usu_telefono" class="form-label">Telefonos</label>
        <input type="text" class="form-control" value="{{ isset($users)?$users->usu_telefono:''}}" id="usu_telefono" name="usu_telefono" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="text" class="form-control" value="{{ isset($users)?$users->email:''}}" id="email" name="email" required>
    </div>

    <button type="submit" class="btn btn-primary btn-submit">Guardar Usuario</button>
</div>
</form>
</div>