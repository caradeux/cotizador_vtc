
 <form class="form-horizontal" method="post" id="guardar_permisos" name="guardar_permisos">
<!-- Modal -->
<div class="modal fade" id="permisos_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Nuevo rol de usuario</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
	  
      <div class="row  ">
		<div class="col-sm-12">
			<label for="nombres" class="control-label">Nombre de rol de usuario</label>
			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresa el nombre del rol de usuario" required data-rule-rangelength="4,20">
		</div>
	  </div>

	  <table class="table table-hover table-nomargin">
		<thead>
		<tr>
			<th >Módulo</th>
			<th ><input name="Todos" type="checkbox" value="1" id="all_ver" class="check_ver"/> Visualizar</th>
			<th ><input name="Todos" type="checkbox" value="1" id="all_mod" class="check_mod"/> Editar</th>
			<th ><input name="Todos" type="checkbox" value="1" id="all_del" class="check_del"/> Eliminar</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql="select * from modulos";
		$query=mysqli_query($con,$sql);
		$num=1;
		while ($row=mysqli_fetch_array($query)){
			$modulo=$row["nombre_modulo"];
		?>
		<tr>
			<td>
				<?php echo $modulo;?>
				<input type='hidden' name='permisos_<?php echo $num;?>' value='<?php echo $modulo;?>'>
			</td>
			<td><input  type ='checkbox' name='view_<?php echo $num;?>' value='1' class='ck'></td>
			<td><input  type ='checkbox' name='edit_<?php echo $num;?>'  value='1' class='ck1'></td>
			<td><input  type ='checkbox' name='del_<?php echo $num;?>'  value='1'  class='ck2'></td>
		</tr>
		<?php		
			$num++;
		}	
		?>
		</tbody>
	</table>
	  
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="guardar_datos" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>