<!-- Modal -->
<form class="form-horizontal" method="post" id="editar_fabricante" name="editar_fabricante">
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar fabricante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="resultados_ajax2"></div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-4 control-label">Nombre</label>
				<div class="col-sm-12">
				  <input type="text" class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del fabricante"required>
				  <input type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
		  <div class="form-group">
				<label for="estado" class="col-sm-4 control-label">Estado</label>
				<div class="col-sm-12">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1">Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			</div>
			  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       	<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>
