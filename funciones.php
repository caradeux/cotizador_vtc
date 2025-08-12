<?php
function counter($table){
	global $con;
	$sql="select count(*) as totales from $table";
	$query=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	return $totales=$row['totales'];
}
function counterNew($table){
	global $con;
	$anio=date("Y");
	$mes=date("m");
	$diaF=date("d");
	$inicio="$anio-$mes-01 00:00:00";
	$fin="$anio-$mes-$diaF 23:59:59";
	if ($table=="estimates"){
		$campo="fecha_cotizacion";
	} else if ($table=="clients"){
		$campo="fecha_agregado";
		
	}else {
		$campo="date_added";
	}
	$sql="select count(*) as totales from $table where $campo between '$inicio' and '$fin'";
	$query=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($query);
	return $totales=$row['totales'];
}

function is_valid(){
	return true;
}
function agregar_cotizacion($id_producto,$session_id){
			global $con;
			$precio=floatval(get_precio($id_producto));
			$query=mysqli_query($con,"select * from tmp_estimate where 	id_producto='$id_producto'");
			$count=mysqli_num_rows($query);
			
			if ($count==0){
				$insert=mysqli_query($con,"INSERT INTO tmp_estimate (id_tmp, id_producto, cantidad_tmp, descuento_tmp, precio_tmp, session_id) VALUES 
				(NULL, '$id_producto', '1', '0', '$precio', '$session_id')");
				if ($insert){
					return true;
				} else {
					return false;
				}
			} else {
				$update=mysqli_query($con,"update tmp_estimate set cantidad_tmp=cantidad_tmp+1 where id_producto='$id_producto'");
				if ($update){
					return true;
				} else {
					return false;
				}
			}
		}	
		function get_precio($id_producto){
			global $con;
			$query=mysqli_query($con,"select precio_producto from products where id_producto='$id_producto'");
			$row=mysqli_fetch_array($query);
			$precio=$row['precio_producto'];
			
			return $precio;
		}
		
		function get_id($table,$row,$condition,$equal){
			global $con;//Variable de conexion
			$sql=mysqli_query($con,"select $row from $table where $condition='$equal' limit 0,1");
			$rw=mysqli_fetch_array($sql);
			$result= $rw[$row];
			return $result;
		}
			
?>