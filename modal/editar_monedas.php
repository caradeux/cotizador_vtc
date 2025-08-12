<!-- Modal -->
<form class="form-horizontal" method="post" id="editar_moneda" name="editar_moneda">
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div id="resultados_ajax2"></div>
			  
			  <div class="row">
				<div class="col-sm-12">
				<label for="nombre" class="control-label">Nombre</label>
				
				  <input type="text" class="form-control" id="nombre_mod" name="nombre" placeholder="Nombre de la moneda"required>
					<input type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-sm-4">
				<label for="simbolo" class=" control-label">Símbolo</label>
				
				  <input type="text" class="form-control" id="simbolo_mod" name="simbolo" placeholder="Símbolo de la moneda" required maxlength="3">
					
				</div>
				
				<div class="col-sm-4">
				<label for="precision" class="control-label">Precisión</label>
				
				  <input type="text" class="form-control" id="precision_mod" name="precision" placeholder="Número de decimales" required maxlength="1" pattern='[0-9]{1}'>
					
				</div>
				
				<div class="col-sm-4">
				<label for="codigo" class="col-sm-4 control-label">Código</label>
				
				  <input type="text" class="form-control" id="codigo_mod" name="codigo" placeholder="Código de la moneda" required maxlength="3" >
					
				</div>
				
				
			  </div>
			  <div class="row">
				
				
				<div class="col-sm-6">
				<label for="millar" class=" control-label">Separador de millares</label>
				
				 <select class="form-control" id="millar_mod" name="millar" required>
					<option value="">-- Selecciona --</option>
					<option value=".">Punto (.) </option>
					<option value=",">Coma (,)</option>
				  </select>
				</div>
				
				<div class="col-sm-6">
				<label for="decimal" class="col-sm-12 control-label">Separador de decimales</label>
				
				 <select class="form-control" id="decimal_mod" name="decimal" required>
					<option value="">-- Selecciona --</option>
					<option value=".">Punto (.) </option>
					<option value=",">Coma (,)</option>
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
