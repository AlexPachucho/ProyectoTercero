@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Órdenes Generadas</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-dark table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="bg-secondary">Matricula</th>
                    <th class="bg-secondary">Codigo</th>
                    <th class="bg-secondary">Fecha Registro</th>
                    <th class="bg-secondary">Valor A Pagar</th>
                    <th class="bg-secondary">Fecha Pago</th>
                    <th class="bg-secondary">Estado</th>
                    <th class="bg-secondary">Responsable</th>
                    <th class="bg-secondary">Valor Pagado</th>
                    <th class="bg-secondary">Numero Documento</th>
                    <th class="bg-secondary">Mes</th>
                    <!-- Agrega más columnas aquí según sea necesario -->
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                <tr>
                    <td>{{ $orden->mat_id }}</td>
                    <td>{{ $orden->codigo }}</td>
                    <td>{{ $orden->fecha }}</td>
                    <td>{{ $orden->valor }}</td>
                    <td>{{ $orden->fecha_pago }}</td>
                    <td>{{ $orden->estado == 0 ? 'Pendiente' : 'Pagado' }}</td>
                    <td>{{ $orden->responsable }}</td>
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
