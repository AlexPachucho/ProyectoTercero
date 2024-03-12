@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 mb-4">EDITAR CURSO</h1>
    <form action="{{route ('cursos.update',$curso->cur_id)}}" method="POST">
        @csrf
        @method('PUT')
        @include('cursos.fields')
    </form>
@endsection