@extends('layouts.app')

@section('content')
<h1>ESTA ES LA VISTA INDEX DE CURSOS</h1>
<a href="{{ route('cursos.create') }}" class="btn btn-info">Nuevo Curso</a>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col">TITULO</th>
        <th scope="col">DESCRIPCION</th>
        <th scope="col">GRUPO</th>
        <th scope="col">ESTADO</th>
        <th scope="col" class="text-center">ACCIONES</th>
      </tr>
    </thead>
    @foreach($cursos as $c)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$c->cur_titulo}}</td>
      <td>{{$c->cur_descripcion}}</td>
      <td>{{$c->cur_grupo}}</td>
      <td>{{$c->cur_estado==1?'Activo':'Inactivo'}}</td>
      <td>
        <div class="btn-group">
          <a href="{{ route('cursos.edit', $c->cur_id) }}" class="btn btn-secondary btn btn-outline-success me-1">
            <i class="bi bi-pencil-square"></i>
          </a>
          <form action="{{ route('cursos.destroy', $c->cur_id) }}" method="POST" onsubmit="return confirm('Desea eliminar el curso?')">
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