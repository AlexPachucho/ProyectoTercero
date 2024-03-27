@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">VISTA GENERA ORDENES</h1>

    <form action="{{ route('generaOrdenes') }}" method="POST" id="orderForm">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group row">
                    <label for="anl_id" class="col-md-4 col-form-label text-white bg-primary">Periodo:</label>
                    <div class="col-md-8">
                        <select name="anl_id" id="anl_id" class="form-control">
                            @foreach ($periodos as $p)
                            <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <label for="jor_id" class="col-md-4 col-form-label text-white bg-success">Jornada:</label>
                    <div class="col-md-8">
                        <select name="jor_id" id="jor_id" class="form-control">
                            @foreach ($jornadas as $j)
                            <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <label for="mes" class="col-md-4 col-form-label text-white bg-info">Mes:</label>
                    <div class="col-md-8">
                        <select name="mes" id="mes" class="form-control">
                            @foreach ($meses as $key => $m)
                            <option value="{{ $key }}">{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning btn-block btn-animate">
                            <i class="fas fa-calendar-plus mr-2"></i> Generar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <div class="container mt-4">
    <h4>Ordenes Generadas</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th class="bg-secondary">Secuencial</th>
                    <th class="bg-secondary">Fecha</th>
                    <th class="bg-secondary">Jornada</th>
                    <th class="bg-secondary">Mes</th>
                    <th class="bg-secondary">Año Lectivo</th>
                    <th class="bg-secondary">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $o)
                <tr>
                    <td>{{ $o->especial }}</td>
                    <td>{{ $o->fecha }}</td>
                    <td>{{ $o->jor_descripcion }}</td>
                    <td>{{ $meses[$o->mes] }}</td>
                    <td>{{ $o->anl_descripcion }}</td>
                    <td>
                        <!-- Botón para ver -->
                        <a href="#" class="btn btn-info btn-sm mr-1">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <!-- Botón para editar -->
                        <a href="#" class="btn btn-primary btn-sm mr-1">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <!-- Botón para eliminar -->
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


</div>
@endsection
