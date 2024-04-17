@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">ORDENES GENERADAS</h1>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <form method="POST" class="d-flex" role="search" action="">
        @csrf
        <div class="d-flex"> <!-- Agregado div para flexibilidad -->
            <a href="{{route('genera_ordenes.index')}}" class="btn btn-warning me-2"> <!-- Modificado para redireccionar -->
                <span class="material-symbols-outlined">arrow_back</span>
            </a>
        </div>
    </form>
    <div class="table-container table-responsive"> <!-- Agregada la clase table-container -->
        <table class="table table-bordered table-striped table-dark table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Matricula</th>
                    <th>Cedula</th>
                    <th>Estudiante</th>
                    <th>Jornada</th>
                    <!-- <th>Codigo</th>
                    <th>Fecha Registro</th> -->
                    <!-- <th>Valor A Pagar</th> -->
                    <th>Fecha Pago</th>
                    <th>Estado</th>
                    <th>Valor Pagado</th>
                    <th>Documento</th>
                    <th>Mes</th>
                    <!-- Agrega más columnas aquí según sea necesario -->
                </tr>
            </thead>
            <tbody>
                @php $contador = 1; @endphp <!-- Inicializa el contador -->
                @foreach ($ordenes as $orden)
                <tr>
                    <td>{{ $contador++ }}</td> <!-- Incrementa el contador -->
                    <td>{{ $orden->mat_id }}</td>
                    <td>{{ $orden->est_cedula }}</td>
                    <td>{{ $orden->est_apellidos . ' ' . $orden->est_nombres }}</td>
                    <td>{{ $orden->jor_descripcion }}</td>
                    <!-- <td>{{ $orden->codigo }}</td>
                    <td>{{ $orden->fecha }}</td> -->
                    <!-- <td>{{ $orden->valor }}</td> -->
                    <td>{{ $orden->fecha_pago }}</td>
                    <td>{{ $orden->estado == 0 ? 'Pendiente' : 'Pagado' }}</td>
                    <td>{{ $orden->vpagado }}</td>
                    <td>{{ $orden->numero_documento }}</td>
                    <td>{{ $meses[$orden->mes] }}</td>
                    <!-- Agrega más columnas aquí según sea necesario -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    .table-container {
        overflow-x: auto;
        margin-bottom: 20px; /* Añade espacio para que no se pegue al fondo */
    }
</style>
