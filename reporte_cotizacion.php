<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	/* Connect To Database*/
	include("config/db.php");
	include("config/conexion.php");

	$daterange= $_GET['daterange'];
	$id_vendedor= intval($_GET['id_vendedor']);
	$q=$_GET['q'];
	
	/*Datos de la empresa*/
	$sql_empresa=mysqli_query($con,"SELECT * FROM empresa where id_empresa=1");
	$rw_empresa=mysqli_fetch_array($sql_empresa);
	$iva=$rw_empresa["iva"];
	$impuesto=($iva/100) + 1;
	
	$nrc=$rw_empresa["nrc"];
	$nombre_empresa=$rw_empresa["nombre"];
	$propietario=$rw_empresa["propietario"];
	$giro=$rw_empresa["giro"];
	$direccion=$rw_empresa["direccion"];
	$telefono=$rw_empresa["telefono"];
	$logo_url=$rw_empresa["logo_url"];
	/*Fin datos empresa*/
	
		function get_currency($id_moneda){
				global $con;
				$sql_currencies=mysqli_query($con,"SELECT * FROM currencies where id='$id_moneda'");
				$rw=mysqli_fetch_array($sql_currencies);
				return $rw;
			}
			
	
	
	// escaping, additionally removing everything that could be (html/javascript-) code
        $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		$id_vendedor=intval($_REQUEST['id_vendedor']);
		$daterange = mysqli_real_escape_string($con,(strip_tags($_REQUEST['daterange'], ENT_QUOTES)));
		$estado = mysqli_real_escape_string($con,(strip_tags($_REQUEST['estado'], ENT_QUOTES)));
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
		 $sWhere .= " and estimates.fecha_cotizacion between '$fecha_inicial' and '$fecha_final' "; 
		 $sWhere.=" order by id_cotizacion desc";
		 //main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere";
		$query = mysqli_query($con, $sql);
	
	

	

	
	/*FIN DATOS COTIZACION*/
	

require __DIR__.'/classes/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
try {
    ob_start();
    include dirname(__FILE__)."/view/pdf/reporte_cotizacion.php";
    $content = ob_get_clean();

   
	$html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
    $html2pdf->writeHTML($content);
    $html2pdf->output('cotizacion.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}