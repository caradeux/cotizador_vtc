<form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			
			<div id="resultados_ajax"></div>
			
			<div class="row">
				<div class="col-sm-12">
					<label for="firstname" class="control-label">Nombres</label>
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="" required>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					<label for="lastname" class="control-label">Apellidos</label>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="" required>
				</div>
			</div>
			 
			  <div class="row">
				<div class="col-sm-12">
					<label for="user_name" class="control-label">Usuario</label>
				  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-12">
					<label for="user_email" class="control-label">Email</label>
					<input type="email" class="form-control" id="user_email" name="user_email" placeholder="" required>
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-12">
					<label for="user_group_id" class="control-label">Grupo</label>
				  <select class="form-control" name="user_group_id" id="user_group_id" required>
					<option value="">Selecciona</option>
						<?php
						$sql_grupos="select * from user_group";
						$query_grupos=mysqli_query($con,$sql_grupos);
						while ($rw_grupos=mysqli_fetch_array($query_grupos)){
							?>
							<option value="<?php echo $rw_grupos['user_group_id'];?>" ><?php echo $rw_grupos['name'];?></option>	
							<?php
						}
						?>
					</select>
				</div>
			  </div>
			  
			  
			  <div class="row">
				<div class="col-sm-6">
					<label for="user_password_new" class="control-label">Contraseña</label>
					<input type="password" class="form-control" id="user_password_new" name="user_password_new" placeholder="" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
				</div>
				<div class="col-sm-6">
					<label for="user_password_repeat" class="control-label">Repite contraseña</label>
					<input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="" pattern=".{6,}" required>
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