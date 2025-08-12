<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	$session_id= session_id();
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("../funciones.php");
	//Inicia Control de Permisos
		include("../config/permisos.php");
		$user_id = $_SESSION['user_id'];
		get_cadena($user_id);
		$modulo="Productos";
		permisos($modulo,$cadena_permisos);
	//Finaliza Control de Permisos
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		$query=mysqli_query($con, "select * from detail_estimate where id_producto='".$id_producto."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM products WHERE id_producto='".$id_producto."'")){
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
			  <strong>Error!</strong> No se pudo eliminar éste  producto. Existen cotizaciones vinculadas a éste producto. 
			</div>
			<?php
		}
		
		
		
	}
	if (isset($_GET['id_producto'])){
		$id_producto=intval($_GET['id_producto']);
		$agregar_cotizacion=agregar_cotizacion($id_producto,$session_id);
		if ($agregar_cotizacion==1){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Bien hecho!</strong> El producto fue agregado a la cotización exitosamente.
			</div>
			<?php
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
        $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$q2 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q2'], ENT_QUOTES)));
		$q3 = intval($_REQUEST['q3']);
		
		 $sTable = "products";
		 $sWhere = " WHERE codigo_producto LIKE '%$q%'";
		 $sWhere .= " AND nombre_producto LIKE '%$q2%'";
		 
		 if ($q3>0){
			 $sWhere .= " AND id_marca_producto = '$q3'";
		 }
		 
		
		$sWhere.=" order by id_producto desc";
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
		$reload = './productos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			/*Datos de la empresa*/
				$sql_empresa=mysqli_query($con,"SELECT * FROM currencies, empresa where currencies.id=empresa.id_moneda");
				$rw_empresa=mysqli_fetch_array($sql_empresa);
				$iva=$rw_empresa["iva"];
				$moneda=$rw_empresa["symbol"];
				$decimals=$rw_empresa["decimals"];
				$thousand_separator=$rw_empresa["thousand_separator"];
				$decimal_separator=$rw_empresa["decimal_separator"];
			/*Fin datos empresa*/
			?>
			<div class="table-responsive productos-table">
			  <table class="table table-hover table-wide">
				<thead>
					<tr>
						<th class="col-codigo">CÓDIGO</th>
						<th class="col-modelo">MODELO</th>
						<th class="col-producto">PRODUCTO</th>
						<th class="col-fabricante">FABRICANTE</th>
						<th class="col-estado">ESTADO</th>
						<th class="col-fecha">AGREGADO</th>
						<th class="col-precio">PRECIO</th>
						<?php 
							if ($permisos_editar==1 or $permisos_eliminar==1){
						?>
						<th class="col-acciones">ACCIONES</th>
						<?php  }?>
					</tr>
				</thead>
				<tbody>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id_producto'];
						$codigo_producto=$row['codigo_producto'];
						$modelo_producto=$row['modelo_producto'];
						$nombre_producto=$row['nombre_producto'];
						$id_marca_producto=$row['id_marca_producto'];
						if (!empty($id_marca_producto)){
							$sql_fab=mysqli_query($con,"select * from manufacturers where id_marca='".$id_marca_producto."'");
							$rw_fab=mysqli_fetch_array($sql_fab);
							$fabricante=$rw_fab['nombre_marca'];
						}
						else {
							$fabricante="";
						}
						$status_producto=$row['status_producto'];
						if ($status_producto==1){$estado="Activo";}
						else {$estado="Inactivo";}
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$precio_producto=$row['precio_producto'];
					?>
					
					<input type="hidden" value="<?php echo $codigo_producto;?>" id="codigo_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $modelo_producto;?>" id="modelo_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo htmlentities($nombre_producto);?>" id="nombre_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $fabricante;?>" id="fabricante<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $estado;?>" id="estado<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo number_format($precio_producto,2,'.','');?>" id="precio_producto<?php echo $id_producto;?>">
					<span id="descripcion<?php echo $id_producto;?>" style="display:none"><?php echo $nombre_producto;?><span>
					<tr>
						<td class="col-codigo">
							<span class="fw-bold text-corporate-primary"><?php echo $codigo_producto; ?></span>
						</td>
						<td class="col-modelo">
							<span class="text-dark"><?php echo $modelo_producto; ?></span>
						</td>
						<td class="col-producto">
							<span class="fw-bold text-dark"><?php echo $nombre_producto; ?></span>
						</td>
						<td class="col-fabricante">
							<span class="text-muted"><?php echo $fabricante;?></span>
						</td>
						<td class="col-estado">
							<span class="badge <?php echo ($status_producto==1) ? 'badge-aprobada' : 'badge-nula'; ?>">
								<?php echo $estado;?>
							</span>
						</td>
						<td class="col-fecha">
							<span class="text-muted small">
								<i class="mdi mdi-calendar me-1"></i><?php echo $date_added;?>
							</span>
						</td>
						<td class="col-precio">
							<span class="fw-bold text-corporate-primary">
								<?php echo $moneda;?> <?php echo number_format($precio_producto,$decimals,$decimal_separator,$thousand_separator);?>
							</span>
						</td>
					<?php 
						if ($permisos_editar==1 or $permisos_eliminar==1){
					?>
					<td class="col-acciones">
						<div class="btn-group" role="group">
						<?php if ($permisos_editar==1){?>
						<button type="button" class="btn btn-success btn-sm" title="Agregar a cotización" onclick="agregar_cotizacion('<?php echo $id_producto;?>');">
							<i class="mdi mdi-cart-plus"></i>
						</button> 
						<button type="button" class="btn btn-info btn-sm" title="Editar producto" onclick="obtener_datos('<?php echo $id_producto;?>');" data-toggle="modal" data-target="#editModalProduct">
							<i class="mdi mdi-pencil"></i>
						</button> 
						<?php }
							if ($permisos_eliminar==1){
						?>
						<button type="button" class="btn btn-danger btn-sm" title="Borrar producto" onclick="eliminar('<?php echo $id_producto; ?>')">
							<i class="mdi mdi-delete"></i>
						</button>
						<?php }?>
						</div>
					</td>
					<?php }?>	
					</tr>
					<?php
				}
				?>
				</tbody>
			  </table>
				<div class="table-pagination">
					<div class="float-right">
						<?php  echo paginate($reload, $page, $total_pages, $adjacents);	?>
					</div>
				</div>
			</div>
			<?php
		}
	}
?>