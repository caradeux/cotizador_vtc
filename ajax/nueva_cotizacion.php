<?php 
session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../login.php");
		exit;
     }
	/* Connect To Database*/
	
	include("../config/db.php");
	include("../config/conexion.php");
	include("../funciones.php");
	$session_id= session_id();
	
	$sql_count=mysqli_query($con,"select * from tmp_estimate where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0){
		$errors[] = "No hay productos agregados a la cotizacion";
	}else if ($_POST['id_cliente']==0){
		$errors[] = "Selecciona el cliente";
	} else if (
		$count >0 &&
		$_POST['id_cliente'] >0 		
	){
		$id_cliente=intval($_POST['id_cliente']);
		$condiciones=mysqli_real_escape_string($con,(strip_tags($_POST["condiciones"],ENT_QUOTES)));
		$validez=mysqli_real_escape_string($con,(strip_tags($_POST["validez"],ENT_QUOTES)));
		$entrega=mysqli_real_escape_string($con,(strip_tags($_POST["entrega"],ENT_QUOTES)));
		$notas=mysqli_real_escape_string($con,(strip_tags($_POST["notas"],ENT_QUOTES)));
		$id_moneda=intval($_POST['moneda']);
		$id_contact=intval($_POST['atencion']);
		$id_plantilla=intval($_POST['id_plantilla']);
		$impuestos=floatval($_POST['taxes']);
		
		
		$sql_cotizacion=mysqli_query($con, "select LAST_INSERT_ID(numero_cotizacion) as last from estimates order by id_cotizacion desc limit 0,1 ");
		$rwC=mysqli_fetch_array($sql_cotizacion);
		$numero_cotizacion=$rwC['last']+1;	
		
		
		/*Datos de la moneda*/
		$sql_currencies=mysqli_query($con,"SELECT * FROM currencies where id='$id_moneda'");
		$rw_currency=mysqli_fetch_array($sql_currencies);
		$moneda=$rw_currency['symbol'];
		$decimals=$rw_currency['decimals'];
		$dec_point=$rw_currency['decimal_separator'];
		$thousands_sep=$rw_currency['thousand_separator'];
		/*Fin datos moneda*/
		
		/*Datos de la empresa*/
		$sql_empresa=mysqli_query($con,"SELECT * FROM empresa where id_empresa=1");
		$rw_empresa=mysqli_fetch_array($sql_empresa);
		//$iva=$rw_empresa["iva"];
		$iva= $impuestos;
		$impuesto=($iva/100) + 1;
		
		
		$user_id=$_SESSION['user_id'];
	
	
	
	
$sumador_descuento=0;
$sumador_total=0;
$sql=mysqli_query($con, "select * from products, tmp_estimate where products.id_producto=tmp_estimate.id_producto and tmp_estimate.session_id='".$session_id."'");
while ($row=mysqli_fetch_array($sql)){
	$id_producto=$row["id_producto"];//Id producto
	$cantidad=$row['cantidad_tmp'];//Cantidad de producto
	$porcentaje=$row['descuento_tmp'] / 100;//Descuento
	$descuento_percent=$row['descuento_tmp'];//Porcentaje
	
	$precio_venta=$row['precio_tmp'];
	$precio_unitario=number_format($precio_venta,$decimals,'.','');//Precio unitario del producto
	$precio_total=$precio_venta*$cantidad;
	$precio_total=number_format($precio_total,$decimals,'.','');
	$total_descuento=$precio_total*$porcentaje;//Total descuento
	$total_descuento=number_format($total_descuento,$decimals,'.','');
	$sumador_descuento+=$total_descuento;
	$sumador_total+=$precio_total;//Sumador
 
	//Insert en la tabla detalle_cotizacion
	$insert_detail=mysqli_query($con, "INSERT INTO `detail_estimate` (`id_detalle_cotizacion`, `numero_cotizacion`, `id_producto`, `cantidad`, `descuento`, `precio_venta`) VALUES (NULL, '$numero_cotizacion', '$id_producto', '$cantidad', '$descuento_percent', '$precio_unitario')");
	
	
	}
	$total_parcial=number_format($sumador_total,2,'.','');
	$sumador_descuento=number_format($sumador_descuento,2,'.','');
	$total_neto=$total_parcial-$sumador_descuento;
	$total_neto=number_format($total_neto,2,'.','');
	
	$total_iva=($total_neto*$iva) / 100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_cotizacion=$total_neto+$total_iva;



	$date=date("Y-m-d H:i:s");
	$insert=mysqli_query($con,"INSERT INTO estimates (id_cotizacion, numero_cotizacion,fecha_cotizacion,condiciones,validez, entrega, status, notas, id_empleado, id_cliente, total_neto, total_iva,currency_id,id_contact,id_plantilla,impuestos) 
	VALUES (NULL,'$numero_cotizacion','$date','$condiciones','$validez','$entrega','0','$notas','$user_id','$id_cliente','$total_neto','$total_iva','$id_moneda','$id_contact','$id_plantilla','$impuestos')");
	$id_cotizacion=mysqli_insert_id($con);
	
	if ($insert){
		$messages[] = "La cotización ha sido ingresada satisfactoriamente.";
		$delete=mysqli_query($con,"DELETE FROM tmp_estimate WHERE session_id='".$session_id."'");
	} else {
		$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
	}
	
?>

	
		
		<?php
	
	
	}
	
	if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			
			
			
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				
				<div class='col-md-12 text-center'>
					
					<div class="btn-group" role="group" aria-label="...">
					  <a href="nueva_cotizacion.php" class="btn btn-light"><i class='fa fa-edit'></i> Nueva cotización</a>
					  <a href="cotizaciones.php" class="btn btn-light"><i class='fa fa-th-list'></i> Lista cotizaciones</a>
					  <button type="button" class="btn btn-light" onclick="descargar('<?php echo $id_cotizacion;?>');"><i class='fa fa-print'></i> Imprimir cotización</button>
					</div>
					
				
				</div>
				<?php
			}
			
?>