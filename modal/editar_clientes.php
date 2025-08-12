	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar cliente</h4>
		 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>
			<div class="row">
				<div class="col-md-12">
					<label for="mod_cliente" class="control-label">Nombre del cliente</label>
					<input type="text" class="form-control" id="mod_cliente" name="mod_cliente" placeholder="" required>
					<input type="hidden" id="mod_id" name="mod_id">
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<label for="mod_nombre_comercial" class="control-label">Nombre comercial</label>
					<input type="text" class="form-control" id="mod_nombre_comercial" name="mod_nombre_comercial" placeholder="" >
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-7">
					<label for="mod_giro" class="control-label">Giro o actividad económica</label>
					<input type="text" class="form-control" id="mod_giro" name="mod_giro" placeholder="" >
				</div>
				
				<div class="col-md-5">
					<label for="mod_registro" class="control-label">Nº de registro fiscal</label>
					<input type="text" class="form-control" id="mod_registro" name="mod_registro" placeholder="" >
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<label for="mod_direccion" class="control-label">Dirección</label>
					<textarea class="form-control" id="direccion" name="mod_direccion"></textarea>
				</div>
				
				
			</div>
			
			<div class="row">
				<div class="col-md-7">
					<label for="mod_email" class="control-label">Correo electrónico</label>
					<input type="email" class="form-control" id="mod_email" name="mod_email" placeholder="" >
				</div>
				<div class="col-md-5">
					<label for="mod_fijo" class="control-label">Ubicacion - Codigo Local</label>
					<input type="text" class="form-control" id="mod_fijo" name="mod_fijo" placeholder="" >
				</div>
				
				
			</div>
			  
			 
			  
			  
			  
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>