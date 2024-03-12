@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 mb-4">CREAR USUARIO</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="container">
    <div class="mb-3">
        <label for="rol_id" class="form-label">Escoja un rol</label>
        <select class="form-select" name="rol_id">
            @foreach($roles as $r)
                <option value="{{$r->rol_id}}">{{$r->rol_descripcion}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" value="" id="name" name="name" required>
    </div>

    <div class="mb-3">
    <label for="usu_nombres" class="form-label">Nombres y Apellidos</label>
    <input type="text" class="form-control" value="" id="usu_nombres" name="usu_nombres" required>
</div>

    <div class="mb-3">
        <label for="usu_telefono" class="form-label">Telefonos</label>
        <input type="text" class="form-control" value="" id="usu_telefono" name="usu_telefono" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="text" class="form-control" value="" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" value="" id="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-submit">Guardar Usuario</button>
</div>
    </form>
</div>
@endsection