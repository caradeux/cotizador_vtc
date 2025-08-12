<?php
	/*Inicia validacion del lado del servidor*/
		 if (empty($_POST['nombre'])){
			$errors[] = "Nombre está vacío";
		} else if (empty($_POST['estado'])){
			$errors[] = "Estado está vacío";
		}  else if (empty($_POST['valor'])){
			$errors[] = "Ingresa el valor";
		}   else if (
			!empty($_POST['nombre']) &&
			!empty($_POST['estado']) &&
			!empty($_POST['valor']) 
			
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$valor=floatval($_POST["valor"]);
		$estado=intval($_POST['estado']);
		
		$sql="INSERT INTO `impuestos` (`id`, `name`, `value`, `status`) VALUES (NULL, '$nombre', '$valor', '$estado');";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Impuesto ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
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
				<?php
			}

?>