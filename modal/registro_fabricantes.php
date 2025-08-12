<!-- Modal -->
<form class="form-horizontal" method="post" id="guardar_fabricante" name="guardar_fabricante">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo fabricante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="resultados_ajax"></div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-4 control-label">Nombre</label>
				<div class="col-sm-12">
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
				</div>
			  </div>
		  
			  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       	<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
      </div>
    </div>
  </div>
</div>
</form>

	