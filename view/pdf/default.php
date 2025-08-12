<style type="text/css">
<!--
div.zone
{
    border: solid 0.5mm red;
    border-radius: 2mm;
    padding: 1mm;
    background-color: #FFF;
    color: #440000;
}
div.zone_over
{
    width: 30mm;
    height: 20mm;
    
}
.bordeado
{
	border: solid 0.5mm #999;
	border-radius: 1mm;
	padding: 0mm;
	font-size:12px;
}
.table {
  border-spacing: 0;
  border-collapse: collapse;
}
.table-bordered td, .table-bordered th {
  padding: 2px;
  text-align: left;
  vertical-align: top;
}
.table-bordered {
  border: 1px solid #999;
  border-collapse: separate;
  
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
}
.left{
	border-left: 1px solid #999;
	
}
.top{
	border-top: 1px solid #999;
}
.bottom{
	border-bottom: 1px solid #999;
}
p
{
	margin: 0px;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 13px; font-family: helvetica" >
	<?php 
		include("page_footer.php");
	?>
       <table style="width:100%">
        <tr style="vertical-align: top">
            <td style="width:25%">
               <?php 
				if (!empty($logo_url) && file_exists($logo_url)){
					// Verificar si la imagen es válida
					$image_info = @getimagesize($logo_url);
					if ($image_info !== false) {
						?>
						<img src="<?php echo $logo_url;?>" style="width: 100%; max-height: 80px; object-fit: contain;">
						<?php 
					} else {
						// Si la imagen no es válida, mostrar texto alternativo
						?>
						<div style="width: 100%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
							<span style="color: #6c757d; font-size: 12px;">Logo no disponible</span>
						</div>
						<?php
					}
				} else {
					// Si no hay logo, mostrar texto alternativo
					?>
					<div style="width: 100%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
						<span style="color: #6c757d; font-size: 12px;">Logo no disponible</span>
					</div>
					<?php
				}
				?>
                
                
            </td>
			<td style="width:55%;text-align:center">
				<span style="font-size:13pt"><strong><?php echo $nombre_empresa;?></strong></span><br>
				<span style="font-size:10pt"><strong><?php echo $giro;?></strong></span><br>
				<span style="color:#555">Rut: <?php echo $nrc;?></span><br>
				<span style="color:#555">Direccion:<?php echo $direccion;?></span><br>
				<span style="color:#555">Telefono: <?php echo $telefono;?></span>
			</td>
            <td style="width:20%">
               
                <div class="zone zone_over" style="text-align: center; vertical-align: top; ">
				COTIZACION<br><br>
				<p style="color:red;font-size:14pt;font-weight:bold">Nº: <?php echo $numero_cotizacion;?></p> 
				
				</div>
               
            </td>
            
        </tr>
        
    </table>
    <p style="width:100%;text-align:right;margin-right:10mm;margin-top:10px;margin-bottom:5px"><strong>Fecha:</strong> <?php echo $fecha_cotizacion;?></p>
    
	
	<table style="width:100%" class="table-bordered">
		<tr style="vertical-align: top">
            <td style="width:50%"><strong>Cliente: </strong> <?php echo $nombre_contact; ?></td>
			<td style="width:50%;"><strong>Telefono:</strong> <?php echo $telefono_contact; ?></td>
		</tr>
		<tr style="vertical-align: top">
            <td style="width:50%"><strong>Empresa: </strong> <?php echo $empresa ?></td>
			<td style="width:50%"><strong>E-mail: </strong> <?php echo $email_contact ?></td>
		</tr>
		<tr style="vertical-align: top">
		<td style="width:50%"><strong>Lugar:</strong> <?php echo $tel2 ?></td>
		<td style="width:50%"><strong>OC:</strong> <?php echo "" ?></td>
			
		</tr>
		 
        
    </table>
	<p style="margin:5px">A continuación Presentamos nuestra oferta que esperamos sea de su conformidad.</p>
	
  
    <table class="table-bordered" style="width:100%;" cellspacing=0>
        <tr>
            <th class="bottom" style="width: 12%">CANTIDAD</th>
            <th class="bottom left" style="width: 50%">DESCRIPCION</th>
            <th class="bottom left" style="width: 19%;text-align:right">PRECIO UNITARIO</th>
			<th class="bottom left" style="width: 19%;text-align:right">TOTAL</th>
            
        </tr>
   
<?php
$sumador_descuento=0;
$sumador_total=0;
$sql=mysqli_query($con, "select * from products, detail_estimate where products.id_producto=detail_estimate.id_producto and detail_estimate.numero_cotizacion='".$numero_cotizacion."'");
while ($row=mysqli_fetch_array($sql))
	{
	
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad'];
	$porcentaje=$row['descuento'] / 100;
	$nombre_producto=html_entity_decode($row['nombre_producto']);
	$id_marca_producto=$row['id_marca_producto'];
	if (!empty($id_marca_producto))
	{
	$sql_marca=mysqli_query($con,"select nombre_marca from manufacturers where id_marca='$id_marca_producto'");
	$rw_marca=mysqli_fetch_array($sql_marca);
	$nombre_marca=$rw_marca['nombre_marca'];
	$marca_producto=" ".strtoupper($nombre_marca);
	}
	else {$marca_producto='';}
	$precio_unitario=number_format($row['precio_venta'],0,'.','');
	
	$precio_total=$precio_unitario*$cantidad;
	$precio_total=number_format($precio_total,0,'.','');
	
	$total_descuento=$precio_total*$porcentaje;//Total descuento
	$total_descuento=number_format($total_descuento,0,'.','');
	$sumador_descuento+=$total_descuento;
	$sumador_total+=$precio_total;//Sumador
	
	$nombre_producto=str_replace("color=\"","style=\"color:",$nombre_producto);
	$nombre_producto=str_replace("font-family","familias",$nombre_producto);
	
	?>
	
        <tr>
            <td class="" style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class="left" style="width: 50%; text-align: left"><?php echo $nombre_producto.$marca_producto;?></td>
            <td class="left" style="width: 20%; text-align: right"><?php echo number_format($precio_unitario,0, $dec_point, $thousands_sep);?></td>
			<td class="left" style="width: 20%; text-align: right"><?php echo number_format($precio_total,0, $dec_point, $thousands_sep);?></td>
            
        </tr>
   
	<?php 
	}
	$total_parcial=number_format($sumador_total,0,'.','');
	$sumador_descuento=number_format($sumador_descuento,0,'.','');
	$total_neto=$total_parcial-$sumador_descuento;
	$total_neto=number_format($total_neto,0,'.','');
	$total_iva=number_format($total_iva,0,'.','');
	$total_cotizacion=$total_neto+$total_iva;
	
	
	
	$txt_iva= get_id('impuestos','name','value',$iva);
	
?>
		<tr style="vertical-align: top">
			<td class="top" colspan=3 style="text-align:right">
				PARCIAL <?php echo $moneda;?>
			</td>
			<td class="top left " style="text-align:right">
			<?php echo number_format($total_parcial,0, $dec_point, $thousands_sep);?>
			</td>
		</tr>
		<?php if ($sumador_descuento>0){?>
		<tr style="vertical-align: top">
			<td class="" colspan=3 style="text-align:right">
				DESCUENTO <?php echo $moneda;?>
			</td>
			<td class="left " style="text-align:right">
			<?php echo number_format($sumador_descuento,0, $dec_point, $thousands_sep);?>
			</td>
		</tr>
		<?php }?>
		<tr style="vertical-align: top">
			<td class="" colspan=3 style="text-align:right">
				NETO <?php echo $moneda;?>
			</td>
			<td class="left " style="text-align:right">
			<?php echo number_format($total_neto,0, $dec_point, $thousands_sep);?>
			</td>
		</tr>
		<tr style="vertical-align: top">
			<td class="" colspan=3 style="text-align:right">
				<?php echo strtoupper($txt_iva);?> <?php echo $iva."% ".$moneda;?>
			</td>
			<td class="left " style="text-align:right">
			<?php echo number_format($total_iva,0, $dec_point, $thousands_sep);?>
			</td>
		</tr>
		<tr style="vertical-align: top">
			<td class="" colspan=3 style="text-align:right">
				TOTAL <?php echo $moneda;?>
			</td>
			<td class="left " style="text-align:right">
			<?php echo number_format($total_cotizacion,0, $dec_point, $thousands_sep);?>
			</td>
		</tr>	
	 </table>
    <?php if (!empty($notas)){?>
		<p>
			<strong>NOTA:</strong><br>
			<?php echo $notas;?>
			
			
		</p>
	<?php }?>
	<br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
                <td style="width:50%;text-align:right"><strong>Condiciones de pago:</strong> </td>
                <td style="width:50%; ">&nbsp;<?php echo $condiciones; ?></td>
            </tr>
			<tr>
                <td style="width:50%;text-align:right"><strong>Validez de la oferta:</strong> </td>
                <td style="width:50%; ">&nbsp;<?php echo $validez; ?></td>
            </tr>
			<tr>
                <td style="width:50%;text-align:right"><strong>Tiempo de entrega:</strong> </td>
                <td style="width:50%; ">&nbsp;<?php echo $entrega; ?></td>
            </tr>
        </table>
    <br><br><br><br>
	
	
	  <table cellspacing="10" style="width: 100%; text-align: left; font-size: 11pt;">
			 <tr>
                <td style="width:33%;text-align: center;border-top:solid 0px"><?php echo $full_name;?></td>
               <td style="width:33%;text-align: center;border-top:solid 0px"></td>
               <td style="width:33%;text-align: center;border-top:solid 0px"></td>
            </tr>		
			 <tr>
                <td style="width:33%;text-align: center;border-top:solid 1px">Jefe Area Tecnica</td>
				<td style="width:33%;text-align: center;border-top:solid 0px"> </td>
               <td style="width:33%;text-align: center;border-top:solid 1px">Aceptado Cliente</td>
            </tr>
        </table>

</page>

