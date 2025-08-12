<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	/* Connect To Database*/
	include("config/db.php");
	include("config/conexion.php");
	include("funciones.php");
	
	$id_cotizacion= intval($_GET['id']);
	/*DATOS DE LA COTIZACION*/
	$sql_cotizacion=mysqli_query($con, "select * from estimates, clients, users where estimates.id_empleado=users.user_id and estimates.id_cliente=clients.id and id_cotizacion='".$id_cotizacion."' ");
	$rwC=mysqli_fetch_array($sql_cotizacion);
	$numsRow=mysqli_num_rows($sql_cotizacion);
	if ($numsRow!=1){
		header("location: cotizaciones.php");
		exit;
	}
	$numero_cotizacion=$rwC['numero_cotizacion'];	
	$fecha_cotizacion=date('d/m/Y', strtotime($rwC['fecha_cotizacion']));
	$atencion=$rwC['contacto'];
	$tel1=$rwC['movil'];
	$empresa=$rwC['nombre_comercial'];
	$tel2=$rwC['fijo'];
	$email=$rwC['email'];
	$condiciones=$rwC['condiciones'];
	$validez=$rwC['validez'];
	$entrega=$rwC['entrega'];
	$full_name=$rwC['firstname'].' '.$rwC['lastname'] ;
	$total_iva=$rwC['total_iva'];
	$id_contact=$rwC['id_contact'];
	//SQL contacto
	$sql_contacto=mysqli_query($con,"select * from contacts where id_contact='".$id_contact."'");
	$rw_contacto=mysqli_fetch_array($sql_contacto);
	$nombre_contact	= $rw_contacto['nombre_contact'];
	$telefono_contact	= $rw_contacto['telefono_contact'];
	$email_contact	= $rw_contacto['email_contact'];
	//Fin SQL contacto
	$notas=$rwC['notas'];
	/*Datos de la empresa*/
	$sql_empresa=mysqli_query($con,"SELECT * FROM empresa where id_empresa=1");
	$rw_empresa=mysqli_fetch_array($sql_empresa);
	//$iva=$rw_empresa["iva"];
	$iva= get_id('estimates','impuestos','numero_cotizacion',$numero_cotizacion);
	$impuesto=($iva/100) + 1;
	
	$nrc=$rw_empresa["nrc"];
	$nombre_empresa=$rw_empresa["nombre"];
	$propietario=$rw_empresa["propietario"];
	$giro=$rw_empresa["giro"];
	$direccion=$rw_empresa["direccion"];
	$telefono=$rw_empresa["telefono"];
	$logo_url=$rw_empresa["logo_url"];
	/*Fin datos empresa*/
	/*Datos de la moneda*/
	$sql_currencies=mysqli_query($con,"SELECT * FROM currencies, estimates where currencies.id=estimates.currency_id and estimates.numero_cotizacion='$numero_cotizacion'");
	$rw_currency=mysqli_fetch_array($sql_currencies);
	$moneda=$rw_currency['symbol'];
	$decimals=$rw_currency['decimals'];
	$dec_point=$rw_currency['decimal_separator'];
	$thousands_sep=$rw_currency['thousand_separator'];
	/*Fin datos moneda*/
	
	
	/*Obtengo la plantilla*/
	
	$id_plantilla=$rwC['id_plantilla'];
	$sql_plantilla=mysqli_query($con,"select * from  plantillas where id='$id_plantilla'");
	$rw_plantilla=mysqli_fetch_array($sql_plantilla);
	$archivo_plantilla=$rw_plantilla['file'];
	
	/*FIN DATOS COTIZACION*/
	

require __DIR__.'/classes/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    // Configurar el manejo de errores para evitar warnings y deprecated notices
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
    
    ob_start();
    include dirname(__FILE__)."/view/pdf/$archivo_plantilla";
    $content = ob_get_clean();

    // Configurar HTML2PDF con opciones más robustas
    $html2pdf = new HTML2Pdf('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
    
    // Configurar opciones adicionales para evitar problemas con imágenes
    $html2pdf->setDefaultFont('helvetica');
    $html2pdf->setTestTdInOnePage(false);
    $html2pdf->setTestIsImage(false);
    
    $html2pdf->writeHTML($content);
    $html2pdf->output('cotizacion.pdf');
    
} catch (Html2PdfException $e) {
    if (isset($html2pdf)) {
        $html2pdf->clean();
    }
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
} catch (Exception $e) {
    echo "Error al generar el PDF: " . $e->getMessage();
}
