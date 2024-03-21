@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">VISTA GENERA ORDENES</h1>

    <form action="{{ route('generaOrdenes') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-3">
                <select name="anl_id" id="anl_id" class="form-control mb-3">
                    @foreach ($periodos as $p)
                    <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="jor_id" id="jor_id" class="form-control mb-3">
                    @foreach ($jornadas as $j)
                    <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="mes" id="mes" class="form-control mb-3">
                    @foreach ($meses as $key => $m)
                    <option value="{{ $key }}">{{ $m }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block">Generar</button>
            </div>
        </div>
    </form>
</div>
@endsection
