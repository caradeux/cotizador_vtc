<!-- Modal -->
<form class="form-horizontal" method="post" id="guardar_moneda" name="guardar_moneda">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="resultados_ajax"></div>
			  
			 <div class="row">
				<label for="nombre" class="col-sm-4 control-label">Nombre</label>
				<div class="col-sm-12">
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la moneda"required>
				
				</div>
			  </div>
			  
			  <div class="row">
			  <div class="col-sm-4">
				<label for="simbolo" class=" control-label">Símbolo</label>
				
				  <input type="text" class="form-control" id="simbolo" name="simbolo" placeholder="Símbolo de la moneda" required maxlength="3">
					
				</div>
				
				
				<div class="col-sm-4">
				<label for="precision" class=" control-label">Precisión</label>
				
				  <input type="text" class="form-control" id="precision" name="precision" placeholder="Número de decimales" required maxlength="1" pattern='[0-9]{1}'>
					
				</div>
				
				<div class="col-sm-4">
				<label for="codigo" class=" control-label">Código</label>
				
				  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de la moneda" required maxlength="3" >
					
				</div>
				
			  </div>
			 
			
			  <div class="row">
			  <div class="col-sm-6">
				<label for="millar" class="control-label">Separador de millares</label>
				
				 <select class="form-control" id="millar" name="millar" required>
					<option value="">-- Selecciona --</option>
					<option value=".">Punto (.) </option>
					<option value=",">Coma (,)</option>
				  </select>
				</div>
				
				
				<div class="col-sm-6">
				<label for="decimal" class="control-label">Separador de decimales</label>
				
				 <select class="form-control" id="decimal" name="decimal" required>
					<option value="">-- Selecciona --</option>
					<option value=".">Punto (.) </option>
					<option value=",">Coma (,)</option>
				  </select>
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

	