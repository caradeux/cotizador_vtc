<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	/* Connect To Database*/
	session_start();
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Inicia Control de Permisos
		include("../config/permisos.php");
		$user_id = $_SESSION['user_id'];
		get_cadena($user_id);
		$modulo="Cotizaciones";
		permisos($modulo,$cadena_permisos);
	//Finaliza Control de Permisos
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_cotizacion=intval($_GET['id']);
		$del1="delete from estimates where numero_cotizacion='".$numero_cotizacion."'";
		$del2="delete from detail_estimate where numero_cotizacion='".$numero_cotizacion."'";
		if ($delete1=mysqli_query($con,$del1) and $delete2=mysqli_query($con,$del2)){
			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="fa fa-check-circle me-2"></i>
				<strong>¡Éxito!</strong> Datos eliminados exitosamente
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="fa fa-exclamation-circle me-2"></i>
				<strong>¡Error!</strong> No se pudo eliminar los datos
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
        $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$id_vendedor=intval($_REQUEST['id_vendedor']);
		$daterange = mysqli_real_escape_string($con,(strip_tags($_REQUEST['daterange'], ENT_QUOTES)));
		$estado=mysqli_real_escape_string($con,(strip_tags($_REQUEST['estado'], ENT_QUOTES)));
		if (!empty($daterange)){
		list ($f_inicio,$f_final)=explode(" - ",$daterange);//Extrae la fecha inicial y la fecha final en formato español
		list ($dia_inicio,$mes_inicio,$anio_inicio)=explode("/",$f_inicio);//Extrae fecha inicial 
		$fecha_inicial="$anio_inicio-$mes_inicio-$dia_inicio 00:00:00";//Fecha inicial formato ingles
		list($dia_fin,$mes_fin,$anio_fin)=explode("/",$f_final);//Extrae la fecha final
		$fecha_final="$anio_fin-$mes_fin-$dia_fin 23:59:59";
		} else {
			$fecha_inicial=date("Y-m")."-01 00:00:00";
			$fecha_final=date("Y-m-d H:i:s");
		}
		
		 $sTable = "estimates, clients, users";
		 $sWhere = "where estimates.id_cliente=clients.id and estimates.id_empleado=users.user_id"; 
	     $sWhere .= " and (clients.contacto like '%$q%' or clients.nombre_comercial like '%$q%')";
		 if ($id_vendedor>0){
			$sWhere .= " and estimates.id_empleado='$id_vendedor'"; 
		 }
		 if ($estado!=""){
			 $sWhere .= " and estimates.status='$estado'"; 
		 }
		 if (!empty($_SESSION['seller'])){
			 $vendedor=$_SESSION['seller'];
			 $sWhere .= " and estimates.id_empleado='$vendedor'"; 
		 }
		 $sWhere .= " and estimates.fecha_cotizacion between '$fecha_inicial' and '$fecha_final' "; 
		 $sWhere.=" order by id_cotizacion desc";
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
		$reload = './buscar_cotizacion.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			function get_currency($id_moneda){
				global $con;
				$sql_currencies=mysqli_query($con,"SELECT * FROM currencies where id='$id_moneda'");
				$rw=mysqli_fetch_array($sql_currencies);
				return $rw;
			}
			 
			
			?>
			<div class="table-responsive">
			  <table class="table table-hover">
				<thead class="table-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Fecha</th>
						<th scope="col">Contacto</th>
						<th scope="col">Cliente</th>
						<th scope="col">Vendedor</th>
						<th scope="col">Estado</th>
						<th scope="col" class="text-end">Neto</th>
						<th scope="col" class="text-end">IVA</th>
						<th scope="col" class="text-end">Total</th>
						<?php 
							if ($permisos_editar==1 or $permisos_eliminar==1){
						?>
						<th scope="col" class="text-center">Acciones</th>
						<?php  }?>
					</tr>
				</thead>
				<tbody>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_cotizacion=$row['id_cotizacion'];
						$numero_cotizacion=$row['numero_cotizacion'];
						$fecha_cotizacion=$row['fecha_cotizacion'];
						list($date,$time)=explode(" ",$fecha_cotizacion);
						list($anio,$mes,$dia)=explode("-",$date);
						$fecha="$dia-$mes-$anio";
						$nombre_cliente=$row['nombre_cliente'];
						$empresa=$row['nombre_comercial'];
						$vendedor=$row['firstname']." ".$row['lastname'];
						$tel2=$row['movil'];
						$email=$row['email'];
						$total_neto=number_format($row['total_neto'],2,'.','');
						$total_iva=number_format($row['total_iva'],2,'.','');
						$monto_total=$total_neto+$total_iva;
						$status=$row['status'];
						if ($status==0){$estado="Pendiente";$label="badge-warning";}
						else if ($status==1) {$estado="Aceptada";$label="badge-success";}
						else if ($status==2) {$estado="En Ejecución";$label="badge-info";}
						else if ($status==3) {$estado="Pagada";$label="badge-primary";}
						else if ($status==4) {$estado="Nula";$label="badge-danger";}
						else {$estado="Desconocido";$label="badge-secondary";}
						$currency_id=$row['currency_id'];
						list($id,$name,$symbol,$decimals, $thousand_separator,$decimal_separator, $code)=get_currency($currency_id);
						$id_contact=$row['id_contact'];
						//SQL contacto
						$sql_contacto=mysqli_query($con,"select * from contacts where id_contact='".$id_contact."'");
						$rw_contacto=mysqli_fetch_array($sql_contacto);
						$nombre_contact	= $rw_contacto['nombre_contact'];
						$telefono_contact	= $rw_contacto['telefono_contact'];
						$email_contact	= $rw_contacto['email_contact'];
						//Fin SQL contacto
						
					?>
					<tr>
						<td>
							<strong class="text-primary"><?php echo $numero_cotizacion; ?></strong>
						</td>
						<td>
							<span class="badge bg-light text-dark">
								<i class="fa fa-calendar me-1"></i><?php echo $fecha; ?>
							</span>
						</td>
						<td>
							<div class="quote-info">
								<strong class="d-block"><?php echo $nombre_contact; ?></strong>
								<?php if (!empty($telefono_contact)){?>
								<small class="text-muted d-block">
									<i class="fa fa-phone me-1"></i><?php echo $telefono_contact;?>
								</small>
								<?php }?>
								<?php if (!empty($email_contact)){?>
								<small class="text-muted d-block">
									<i class="fa fa-envelope me-1"></i><?php echo $email_contact;?>
								</small>
								<?php }?>
							</div>
						</td>
						<td>
							<div class="quote-info">
								<strong class="d-block"><?php echo $nombre_cliente; ?></strong>
								<?php if (!empty($empresa)){?>
								<small class="text-muted d-block"><?php echo $empresa;?></small>
								<?php }?>
								<?php if (!empty($tel2)){?>
								<small class="text-muted d-block">
									<i class="fa fa-phone me-1"></i><?php echo $tel2;?>
								</small>
								<?php }?>
								<?php if (!empty($email)){?>
								<small class="text-muted d-block">
									<i class="fa fa-envelope me-1"></i><?php echo $email;?>
								</small>
								<?php }?>
							</div>
						</td>
						<td>
							<span class="badge bg-info"><?php echo $vendedor;?></span>
						</td>
						<td>
							<span class="badge <?php echo $label;?>"><?php echo $estado;?></span>
						</td>
						<td class="text-end">
							<strong><?php echo $symbol;?> <?php echo number_format($total_neto,$decimals,$decimal_separator,$thousand_separator);?></strong>
						</td>
						<td class="text-end">
							<strong><?php echo $symbol;?> <?php echo number_format($total_iva,$decimals,$decimal_separator,$thousand_separator);?></strong>
						</td>
						<td class="text-end">
							<strong class="text-primary"><?php echo $symbol;?> <?php echo number_format($monto_total,$decimals,$decimal_separator,$thousand_separator);?></strong>
						</td>
					<?php 
						if ($permisos_editar==1 or $permisos_eliminar==1){
					?>	
                    <td class="text-center">
                        <div class="dropdown dropleft">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $numero_cotizacion; ?>" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-cog"></i>
							</button>
                            <ul class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownMenuButton<?php echo $numero_cotizacion; ?>">
								<?php if ($permisos_editar==1){?>
								<li>
									<a class="dropdown-item" href="editar_cotizacion.php?id=<?php echo $numero_cotizacion;?>" title="Editar cotización">
										<i class="fa fa-edit me-2"></i>Editar
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#" title="Imprimir cotización" onclick="descargar('<?php echo $id_cotizacion;?>');">
										<i class="fa fa-print me-2"></i>Imprimir
									</a>
								</li>
                                <li>
                                    <a class="dropdown-item" href="#" title="Enviar cotización" data-toggle="modal" data-target="#myModal" data-number="<?php echo $id_cotizacion;?>" data-email="<?php echo $email;?>">
										<i class="fa fa-envelope me-2"></i>Enviar Email
									</a>
								</li>
								<?php }
									if ($permisos_eliminar==1){
								?>
								<li><hr class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item text-danger" href="#" title="Borrar cotización" onclick="eliminar('<?php echo $numero_cotizacion; ?>')">
										<i class="fa fa-trash me-2"></i>Eliminar
									</a>
								</li>
								<?php }?>
							</ul>
						</div>
					</td>
					<?php }?>		
					</tr>
					<?php
				}
				?>
				</tbody>
			  </table>
				<div class="d-flex justify-content-end">
					<?php  echo paginate($reload, $page, $total_pages, $adjacents);	?>
				</div>
			</div>
			<?php
		} else {
			?>
			<div class="alert alert-info text-center" role="alert">
				<i class="fa fa-info-circle me-2"></i>
				<strong>No se encontraron cotizaciones</strong> con los filtros aplicados
			</div>
			<?php
		}
	}
?>