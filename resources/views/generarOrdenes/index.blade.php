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
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Secuencial</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $c)
                <tr>
                    <td>{{ $c->especial }}</td>
                    <td>{{ $c->fecha }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>

    

<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        // Validación del formulario del lado del cliente
        $('#orderForm').validate({
            rules: {
                anl_id: 'required',
                jor_id: 'required',
                mes: 'required'
            },
            messages: {
                anl_id: 'Por favor, selecciona un periodo.',
                jor_id: 'Por favor, selecciona una jornada.',
                mes: 'Por favor, selecciona un mes.'
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });

        // Limpiar estilos de validación al recargar la página
        $(window).on('load', function () {
            $('.form-control').removeClass('is-valid');
        });
    });
</script> -->

<style>
    .btn-animate {
        transition: background-color 0.3s ease;
    }

    .btn-animate:hover {
        background-color: #ffcc00;
    }
</style>
@endsection
