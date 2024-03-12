@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 mb-4">EDITAR USUARIO</h1>
    <form action="{{ route('users.update', $users->usu_id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('users.fields')
    </form>
</div>
@endsection