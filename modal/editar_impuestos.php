<!-- Modal -->
<form class="form-horizontal" method="post" id="editar_impuesto" name="editar_impuesto">
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar impuesto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="resultados_ajax2"></div>
			  
			  <div class="row">
				<div class="col-sm-12">
				<label for="nombre" class="control-label">Nombre</label>
				
				  <input type="text" class="form-control" id="nombre_mod" name="nombre_mod" placeholder="Nombre de la moneda"required>
					<input type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-sm-6">
				<label for="estado_mod" class=" control-label">Estado</label>
				
				  <select name="estado_mod" id="estado_mod" class='form-control' required >
						<option value=1 >Activo</option>
						<option value=0 >Inactivo</option>
					</select>
					
				</div>
				
				<div class="col-sm-6">
					<label for="valor_mod" class=" control-label">Valor (%)</label>
				
					<input type="text" class="form-control" id="valor_mod" name="valor_mod" placeholder="%" required maxlength="5">
					
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
