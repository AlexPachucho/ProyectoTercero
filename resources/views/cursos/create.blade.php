@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 mb-4">CREAR CURSO</h1>
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        @include('cursos.fields')
    </form>
</div>
@endsection