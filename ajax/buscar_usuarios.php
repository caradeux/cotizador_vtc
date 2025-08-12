<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	//Inicia Control de Permisos
		include("../config/permisos.php");
		$user_id = $_SESSION['user_id'];
		get_cadena($user_id);
		$modulo="Usuarios";
		permisos($modulo,$cadena_permisos);
	//Finaliza Control de Permisos
	
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$user_id=intval($_GET['id']);
		$query=mysqli_query($con, "select * from users where user_id='".$user_id."'");
		$rw_user=mysqli_fetch_array($query);
		$count=$rw_user['user_id'];
		if ($count>1){
			if ($delete1=mysqli_query($con,"DELETE FROM users WHERE user_id='".$user_id."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puede borrar el usuario administrador. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('firstname', 'lastname');//Columnas de busqueda
		 $sTable = "users, user_group";
		 $campos="users.user_id, users.firstname, users.lastname, users.user_email, users.user_name, users.date_added, user_group.name, users.user_group_id";
		 $sWhere=" WHERE users.user_group_id=user_group.user_group_id";
		 
		if ( $_GET['q'] != "" )
		{
			$sWhere.=" and (firstname LIKE '%".$q."%' or lastname LIKE '%".$q."%')";
		}
		
		if (!empty($_SESSION['profile'])){
			 $usuario=$_SESSION['profile'];
			 $sWhere .= " and users.user_id='$usuario'"; 
		 }
		 
		$sWhere.=" order by user_id";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './usuarios.php';
		//main query to fetch the data
		$sql="SELECT $campos FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					
					<th>Nombres</th>
					<th>Usuario</th>
					<th>Email</th>
					<th>Grupo</th>
					<th>Agregado</th>
					
					<?php 
						if ($permisos_editar==1 or $permisos_eliminar==1){
					?>
					<th class='text-right'>Acciones</th>
					<?php }?>	
					
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$user_id=$row['user_id'];
						$user_group_id=$row['user_group_id'];
						$fullname=$row['firstname']." ".$row["lastname"];
						$user_name=$row['user_name'];
						$user_email=$row['user_email'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$user_group_name=$row['name'];
						
					?>
					
					<tr>
						<td><?php echo $fullname; ?></td>
						<td ><?php echo $user_name; ?></td>
						<td ><?php echo $user_email; ?></td>
						<td ><?php echo $user_group_name; ?></td>
						<td><?php echo $date_added;?></td>
					<?php 
						if ($permisos_editar==1 or $permisos_eliminar==1){
					?>	
					<td class='text-right'>
					<?php if ($permisos_editar==1){?>				
					<a href="#" class='btn btn-info' title='Editar usuario' data-user_group_id="<?php echo $user_group_id;?>" data-firstname="<?php echo $row['firstname'];?>" data-lastname="<?php echo $row['lastname'];?>"  data-user_name="<?php echo $user_name;?>" data-user_email="<?php echo $user_email;?>" data-id="<?php echo $user_id;?>" data-toggle="modal" data-target="#myModal2"><i class="fa fa-edit"></i></a>  
					<a href="#" class='btn btn-info' title='Cambiar contraseña' onclick="get_user_id('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal3"><i class="fa fa-cog"></i></a> 
					<?php }
						if ($permisos_eliminar==1){
					?>
					<a href="#" class='btn btn-danger' title='Borrar usuario' onclick="eliminar('<? echo $user_id; ?>')"><i class="fa fa-trash"></i> </a>
					
					<?php }?>
					
					</td>
						<?php }?>
					</tr>
					<?php
				}
				?>
				</table>
				<div class="float-right">
					<?php  echo paginate($reload, $page, $total_pages, $adjacents);	?>
				</div >
			</div>
			<?php
		}
	}
?>