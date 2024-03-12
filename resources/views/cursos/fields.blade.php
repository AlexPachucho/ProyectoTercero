<div class="container">
    <div class="mb-3">
        <label for="cur_titulo" class="form-label">Título Del Curso</label>
        <input type="text" class="form-control" value="{{ isset($curso)?$curso->cur_titulo:''}}" id="cur_titulo" name="cur_titulo" required>
    </div>
    <div class="mb-3">
        <label for="cur_descripcion" class="form-label">Descripción Del Curso</label>
        <textarea class="form-control" id="cur_descripcion" name="cur_descripcion" required>{{ isset($curso) ? $curso->cur_descripcion : '' }}</textarea>
    </div>

    <div class="mb-3">
        <label for="cur_grupo" class="form-label">Grupo Del Curso</label>
        <input type="text" class="form-control" value="{{ isset($curso)?$curso->cur_grupo:''}}" id="cur_grupo" name="cur_grupo" required>
    </div>
    <button type="submit" class="btn btn-primary btn-submit">Guardar Curso</button>
</div>