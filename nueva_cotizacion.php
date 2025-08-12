<?php
require_once("checking.php");
require_once("config/db.php");
require_once("classes/Login.php");
$login = new Login();
	// ... ask if we are logged in here:
	if ($login->isUserLoggedIn() == true) 
	{	
		/* Connect To Database*/
		require_once ("config/conexion.php");
		include("funciones.php");
		//Inicia Control de Permisos
		include("./config/permisos.php");
		$user_id = $_SESSION['user_id'];
		get_cadena($user_id);
		$modulo="Cotizaciones";
		permisos($modulo,$cadena_permisos);
		//Finaliza Control de Permisos
		$title="Nueva cotización";
		$active_inicio="active";
		include('view/nueva_cotizacion.php');//Include file with the view
	}
	else
	{
		header("location: login.php");
		exit;		
	}
?>
