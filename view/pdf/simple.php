<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.class-theme{
	background:#2c3e50;
	padding: 5px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 5px;
}
.clouds{
	background:#ecf0f1;
	padding: 5px;
}
.border-top{
	border-top: solid 2px #eee;
	
}
.border-left{
	border-left: solid 2px #eee;
}
.border-right{
	border-right: solid 2px #eee;
}
.border-bottom{
	border-bottom: solid 2px #eee;
}

table.page_header{
	width: 100%;
	padding:0px;

}

table.page_footer{
	width: 100%;
	padding:0px;
}
.orange-bottom{
	border-bottom: #e74c3c 3px;
}
.orange-top{
	border-top: #e74c3c 3px;
}
.orange-left{
	border-left: #e74c3c 3px;
}
.white{
	border-bottom:white 3px;
}
table, p{
	color:#2c3e50;
}

-->
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm" style="font-size: 12pt; font-family: arial" >


	
    
    
	<table cellspacing="0" style="width: 100%; text-align: left; font-size:14px;" border=0>
		<tr>
			<td  style="width:60%;font-size:24px;text-align:left;"><b><?php echo $nombre_empresa;?>  </b></td>
			<td style="width:40%;font-size:24px;text-align:right;"><b>COTIZACIÓN  </b></td>
			
		</tr>
		
		<tr>
			<td  style="width:60%;font-size:13px;text-align:left;">
				<span style="color:#555"><?php echo $giro;?></span><br>
				<span style="color:#555"><?php echo $nrc;?></span><br>
				<span style="color:#555"><?php echo $direccion;?></span><br>
				<span style="color:#555">Tel.: <?php echo $telefono;?></span><br>
				<span style="color:#555">E-mail: <?php echo $rw_empresa["email"];?></span>
			
			</td>
			<td style="width:40%;font-size:24px;text-align:right;">
				<?php 
				if (!empty($logo_url) && file_exists($logo_url)){
					// Verificar si la imagen es válida
					$image_info = @getimagesize($logo_url);
					if ($image_info !== false) {
						?>
						<img src="<?php echo $logo_url;?>" style="width: 50%; max-height: 80px; object-fit: contain;">
						<?php 
					} else {
						?>
						<div style="width: 50%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
							<span style="color: #6c757d; font-size: 12px;">Logo no disponible</span>
						</div>
						<?php
					}
				} else {
					?>
					<div style="width: 50%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
						<span style="color: #6c757d; font-size: 12px;">Logo no disponible</span>
					</div>
					<?php
				}	
				?>
			
			</td>
			
		</tr>
		
		
		
		
	</table>


<table cellspacing="0" style="width: 100%; text-align: left; font-size:14px;margin-top:10px">
		<tr>
			
			<td style="width:50%;font-size:24px; "><b>COTIZADO A </b>
			<br>
				<address style="font-size:13px">
				<strong><?php echo $rwC['nombre_contact'];?></strong>
			<br>
             <?php echo $rwC['direccion'];?><br>
            Teléfono: <?php echo $rwC['fijo'];?><br>
              Email: <?php echo $rwC['email'];?>
            </address>
			
			</td>
			<td style="width:50%;text-align:right">
				<span><b>COTIZACIÓN #:</b></span> <?php echo $numero_cotizacion;?><br>
				<span><b>FECHA:</b></span> <?php echo $fecha_cotizacion;?>
			</td>
			
			
		</tr>
		
		
	</table>

	
	<p style="margin-left:10px;text-align:center;font-size:11pt;">A continuación presentamos nuestra oferta que esperamos sea de su conformidad.</p>
	
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
           
			<th style="width: 10%;text-align:center" class='class-theme'>CANT.</th>
            <th style="width: 50%" class='class-theme'>DESCRIPCION</th>
            <th style="width: 20%;text-align: right" class='class-theme'>PRECIO UNIT.</th>
            <th style="width: 20%;text-align: right" class='class-theme'>PRECIO TOTAL</th>
            
        </tr>

<?php
	$nums=1;
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
	$precio_unitario=number_format($row['precio_venta'],$decimals,'.','');
	
	$precio_total=$precio_unitario*$cantidad;
	$precio_total=number_format($precio_total,$decimals,'.','');
	
	$total_descuento=$precio_total*$porcentaje;//Total descuento
	$total_descuento=number_format($total_descuento,$decimals,'.','');
	$sumador_descuento+=$total_descuento;
	$sumador_total+=$precio_total;//Sumador
	
	$nombre_producto=str_replace("color=\"","style=\"color:",$nombre_producto);
	$nombre_producto=str_replace("font-family","familias",$nombre_producto);
	
	
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
			<td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 50%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 20%; text-align: right"><?php echo number_format($precio_unitario,$decimals,$dec_point, $thousands_sep);?></td>
            <td class='<?php echo $clase;?>' style="width: 20%; text-align: right"><?php echo number_format($precio_total,$decimals,$dec_point, $thousands_sep);?></td>
            
        </tr>

	<?php 

	
	$nums++;
	}
	$total_parcial=number_format($sumador_total,$decimals,'.','');
	$sumador_descuento=number_format($sumador_descuento,$decimals,'.','');
	$total_neto=$total_parcial-$sumador_descuento;
	$total_neto=number_format($total_neto,$decimals,'.','');
	$total_iva=number_format($total_iva,$decimals,'.','');
	$total_cotizacion=$total_neto+$total_iva;
	
	$txt_iva= get_id('impuestos','name','value',$iva);
?>
	  
       
    </table>
	
	
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;margin-top:20px">
		<tr>
			
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-top border-left'><b>SUBTOTAL <?php echo $moneda;?>  </b></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-top border-right'><?php echo number_format($total_parcial,$decimals, $dec_point, $thousands_sep);?></td>
			
		</tr>
	<?php 
		if ($sumador_descuento>0){
	?>	
		<tr>
			
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-left'><b>DESC.<?php echo $moneda;?>  </b></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-right'><?php echo number_format($sumador_descuento,$decimals, $dec_point, $thousands_sep);?></td>
			
		</tr>
		
		<tr>
			
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-left'><b>NETO <?php echo $moneda;?>  </b></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-right'><?php echo number_format($total_neto,$decimals, $dec_point, $thousands_sep);?></td>
			
		</tr>
	<?php }?>	
		<tr>
			
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-left'><b><?php echo strtoupper($txt_iva);?> <?php echo $iva."% ".$moneda;?>  </b></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-right'><?php echo number_format($total_iva,$decimals, $dec_point, $thousands_sep);?></td>
		
		</tr>
		<tr>
			
			<td style="width:35%;font-size:14px;" class=''>
			
			</td>
			<td style="width:25%;font-size:24px;" ></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-bottom border-left'><b>TOTAL <?php echo $moneda;?>  </b></td>
			<td style="width:20%;font-size:14px;text-align:right;padding:5px" class='border-bottom border-right'><?php echo number_format($total_cotizacion,$decimals, $dec_point, $thousands_sep);?></td>
			
		</tr>
		
		
	</table>
	
	
	
	<br>
	
    <?php 	if (!empty($notas)){ ?>
	<div style="font-size:11pt;text-align:left;color:#2c3e50">
		<b>Nota: </b><?php echo $notas;?>
	</div>
	<?php } ?>
	<br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
				<td style="width:15%;border-right: 2px solid #2c3e50"> </td>
                <td style="width:80%;text-align:left;font-family: helvetica;padding:15px" colspan=2><b>CONDICIONES Y FORMA DE PAGO</b> </td>
                
			
            </tr>

			<tr>
				<td style="width:15%;border-right: 2px solid #2c3e50" > </td>
                <td style="width:80%;text-align:left;padding-left:15px">Condiciones de pago: <?php echo $condiciones; ?></td>
               
				
            </tr>
			<tr>
				<td style="width:15%;border-right: 2px solid #2c3e50" > </td>
                <td style="width:80%;text-align:left;padding-left:15px">Validez de la oferta: <?php echo $validez; ?></td>
                
				
            </tr>
			<tr>
				<td style="width:15%;border-right: 2px solid #2c3e50"> </td>
                <td style="width:80%;text-align:left;padding-left:15px;padding-bottom:15px">Tiempo de entrega: <?php echo $entrega; ?></td>
                
				
            </tr>
        </table>
	
	
	  

</page>

