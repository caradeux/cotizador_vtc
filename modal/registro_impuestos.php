<!-- Modal -->
<form class="form-horizontal" method="post" id="guardar_impuestos" name="guardar_impuestos">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo impuesto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="resultados_ajax"></div>
			  
			 <div class="row">
				
				<div class="col-sm-12">
					<label for="nombre" class="control-label">Nombre</label>	
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del impuesto"required>
				
				</div>
				
				
				</div>
				
			  
			  
			  
			  <div class="row">
				<div class="col-sm-6">
					<label for="estado" class=" control-label">Estado</label>
				
					<select name="estado" id="estado" class='form-control' required >
						<option value=1 selected>Activo</option>
					</select>
					
				</div>
				
				<div class="col-sm-6">
					<label for="valor" class=" control-label">Valor (%)</label>
				
				  <input type="text" class="form-control" id="valor" name="valor" placeholder="%" required maxlength="5">
					
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

	