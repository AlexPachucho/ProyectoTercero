@extends('layouts.app')
@section('content')
<h1>LISTA DE USUARIOS</h1>
<a href="{{ route('users.create') }}" class="btn btn-info">Nuevo Usuario</a>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col">USUARIO</th>
        <th scope="col">ROL</th>
        <th scope="col">NOMBRES</th>
        <th scope="col">TELEFONOS</th>
        <th scope="col">EMAIL</th>
        <th scope="col">ESTADO</th>
        <th scope="col" class="text-center">ACCIONES</th>
      </tr>
    </thead>
    @foreach($users as $u)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$u->name}}</td>
      <td>{{$u->rol_descripcion}}</td>
      <td>{{$u->usu_nombres}}</td>
      <td>{{$u->usu_telefono}}</td>
      <td>{{$u->email}}</td>
      <td>{{$u->usu_estado==1?'Activo':'Inactivo'}}</td>
      <td>
        <div class="btn-group">
          <a href="{{ route('users.edit', $u->usu_id) }}" class="btn btn-secondary btn btn-outline-success me-1">
            <i class="bi bi-pencil-square"></i>
          </a>
          <form action="{{ route('users.destroy', $u->usu_id) }}" method="POST" onsubmit="return confirm('Desea eliminar el usuario?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary btn btn-outline-danger">
              <i class="bi bi-trash3"></i>
            </button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection