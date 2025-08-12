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
		$modulo="Configuracion";
		permisos($modulo,$cadena_permisos);
	//Finaliza Control de Permisos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_impuesto=intval($_GET['id']);
		
		if ($id_impuesto!=1){
		
		
			if ($delete1=mysqli_query($con,"DELETE FROM impuestos WHERE id='".$id_impuesto."'")){
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
			  <strong>Error!</strong> No se puede eliminar el impuesto prederminado
			</div>
		<?php
	}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('name');//Columnas de busqueda
		 $sTable = "impuestos";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id";
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
		$reload = './fabricantes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>ID</th>
					<th>Nombre</th>
					<th class='text-center'>Valor (%)</th>
					<th>Estado</th>
				
					<?php 
						if ($permisos_editar==1 or $permisos_eliminar==1){
					?>
					<th class='text-right'>Acciones</th>
					<?php }?>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id			=$row['id'];
						$nombre				=$row['name'];
						$value				=$row['value'];
						$status				=$row['status'];
						if ($status==1){$txt_status='Activo';$label_class='success';}
						else {$txt_status='Inactivo';$label_class='danger';}
						
					?>
		
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $nombre;?></td>
						<td class='text-center'><?php echo $value;?></td>
						<td><span class="label label-<?php echo $label_class;?>"><?php echo $txt_status;?></span></td>
					
						
					<?php 
						if ($permisos_editar==1 or $permisos_eliminar==1){
					?>
					<td class='text-right'>
					
						
					<?php if ($permisos_editar==1){?>
						<a href="#" class='btn btn-info' title='Editar impuesto'  data-toggle="modal" data-target="#myModal2" data-nombre="<?php echo $nombre;?>" data-estado="<?php echo $status;?>" data-valor="<?php echo $value;?>" data-id="<?php echo $id;?>"><i class="fa fa-edit"></i></a> 
					<?php }
					if ($permisos_eliminar==1){	?>	
						<a href="#" class='btn btn-danger' title='Borrar impuesto' onclick="eliminar('<?php echo $id; ?>')"><i class="fa fa-trash"></i> </a>
					
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