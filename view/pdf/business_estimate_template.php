<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.class-theme{
	background:#3498db;
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
	border-bottom: #3498db 3px;
}
.orange-top{
	border-top: #3498db 3px;
}
.orange-left{
	border-left: #3498db 3px;
}
.white{
	border-bottom:white 3px;
}
table, p{
	color:#2c3e50;
}

-->
</style>
<page backtop="10mm" backbottom="mm" backleft="0mm" backright="0mm" style="font-size: 12pt; font-family: arial" >

	
	<page_footer>
        <table class="page_footer" cellspacing=0 cellpadding=0 >
            <tr>

                
				
                <td style="width: 33%; text-align: center;vertical-align:middle;" class='orange-top'>
					<b style="color:#333">Teléfono</b><br>
					<?php echo $telefono;?>
                </td>
				<td style="width: 34%; text-align: center;vertical-align:middle;" class='orange-top'>
					<b style="color:#333">Correo electrónico</b><br>
					<?php echo $rw_empresa["email"];?>
                </td>
				<td style="width: 33%; text-align: center;vertical-align:middle" class='orange-top'>
					<b style="color:#333">Dirección</b><br>
					<?php echo $direccion;?>
                </td>
				
				
				
            </tr>


			
        </table>
    </page_footer>

	<table cellspacing="0" style="width: 100%; text-align: left; font-size:20px;">
		<tr>
			<td style="width:5%;"> </td>
			<td style="width: 25%; text-align: left;vertical-align:top" > 
                    <?php 
				if (!empty($logo_url) && file_exists($logo_url)){
					// Verificar si la imagen es válida
					$image_info = @getimagesize($logo_url);
					if ($image_info !== false) {
						?>
						<img style="width: 100%; max-height: 80px; object-fit: contain;" src="<?php echo $logo_url;?>" alt="Logo"><br>
						<?php 
					} else {
						?>
						<div style="width: 100%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
							<span style="color: #6c757d; font-size: 12px;">Logo no disponible</span>
						</div>
						<?php
					}
				} else {
					?>
					<div style="width: 100%; height: 80px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6; border-radius: 4px;">
						<span style="color: #6c757d; font-size: 12px;">Logo no disponible</span>
					</div>
					<?php
				}
				?>
            </td>
			<td style="width:65%;font-size:30px;color:#3498db;background-color:white;text-align:right;vertical-align:middle"><b>COTIZACIÓN </b></td>
			
			<td style="width:5%;"> </td>
		</tr>
		
		
	</table>
	
	
	
    
	<table cellspacing="0" style="width: 100%; text-align: left; font-size:14px;margin-top:10px">
		<tr>
			<td style="width:5%;"> </td>
			<td style="width:45%;font-size:24px;color:#3498db;background-color:#ecf0f1;padding:10px;border-top-left-radius: 15px;border-top-right-radius: 15px; "><b>COTIZADO A </b></td>
			<td style="width:45%;text-align:right">
				<span style="color:#3498db"><b>COTIZACIÓN #:</b></span> <?php echo $numero_cotizacion;?><br>
				<span style="color:#3498db"><b>FECHA:</b></span> <?php echo $fecha_cotizacion;?>
			</td>
			
			<td style="width:5%;"> </td>
		</tr>
		
		<tr>
			<td style="width:5%;"> </td>
			<td style="width:45%;background-color:#ecf0f1;padding:0px 0px 10px 10px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; ">
			   <address>
              <strong><?php echo $rwC['nombre_cliente'];?></strong><br>
             <?php echo $rwC['direccion'];?><br>
            Teléfono: <?php echo $rwC['fijo'];?><br>
              Email: <?php echo $rwC['email'];?>
            </address>
			
			</td>
			<td style="width:45%;text-align:left;">
				
			</td>
			
			<td style="width:5%;"> </td>
		</tr>
	</table>

		

	
	
   
    
	<p style="margin-left:10px;text-align:center;font-size:11pt;">A continuación presentamos nuestra oferta que esperamos sea de su conformidad.</p>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 5%;text-align:center" class='class-theme'></th>
			<th style="width: 10%;text-align:center" class='class-theme'>CANT.</th>
            <th style="width: 50%" class='class-theme'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='class-theme'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='class-theme'>PRECIO TOTAL</th>
            <th style="width: 5%;text-align:center" class='class-theme'></th>
        </tr>

<?php
	$nums=1;
	$sumador_descuento=0;
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from products, detail_estimate where products.id_producto=detail_estimate.id_producto and detail_estimate.numero_cotizacion='".$numero_cotizacion."'");


	while ($row=mysqli_fetch_array($sql)){
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
			 <td class='<?php echo $clase;?>' style="width: 5%; text-align: center"></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 50%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo number_format($precio_unitario,$decimals,$dec_point, $thousands_sep);?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo number_format($precio_total,$decimals,$dec_point, $thousands_sep);?></td>
            <td class='<?php echo $clase;?>' style="width: 5%; text-align: center"></td>
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
			<td style="width:5%;"> </td>
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-top border-left'><b>SUBTOTAL <?php echo $moneda;?>  </b></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-top border-right'><?php echo number_format($total_parcial,$decimals, $dec_point, $thousands_sep);?></td>
			<td style="width:5%;font-size:24px;text-align:center;"></td>
		</tr>
	<?php 
		if ($sumador_descuento>0){
	?>
		<tr>
			<td style="width:5%;"> </td>
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-left'><b>DESC. <?php echo $moneda;?>   </b></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-right'><?php echo number_format($sumador_descuento,$decimals, $dec_point, $thousands_sep);?></td>
			<td style="width:5%;font-size:24px;text-align:center;"></td>
		</tr>
		
		<tr>
			<td style="width:5%;"> </td>
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-left'><b>NETO <?php echo $moneda;?>   </b></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-right'><?php echo number_format($total_neto,$decimals, $dec_point, $thousands_sep);?></td>
			<td style="width:5%;font-size:24px;text-align:center;"></td>
		</tr>
		<?php }?>	
		
		<tr>
			<td style="width:5%;"> </td>
			<td style="width:35%;font-size:24px;"></td>
			<td style="width:25%;font-size:24px;"></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-left'><b><?php echo strtoupper($txt_iva);?>  <?php echo $iva."% ".$moneda;?>   </b></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px" class='border-right'><?php echo number_format($total_iva,$decimals, $dec_point, $thousands_sep);?></td>
			<td style="width:5%;font-size:24px;text-align:center;"></td>
		</tr>
		
		
		<tr>
			<td style="width:5%;"> </td>
			<td style="width:35%;font-size:14px;" class=''>
			
			</td>
			<td style="width:25%;font-size:24px;" ></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px;background-color:#3498db;color:white" ><b>TOTAL <?php echo $moneda;?>  </b></td>
			<td style="width:15%;font-size:14px;text-align:right;padding:5px;background-color:#3498db;color:white" ><?php echo number_format($total_cotizacion,$decimals, $dec_point, $thousands_sep);?></td>
			<td style="width:5%;font-size:24px;text-align:center;"></td>
		</tr>
		
		
	</table>
	
	
	
	<br>
	
    
	<?php 	if (!empty($notas)){ ?>
	<div style="font-size:11pt;text-align:center;font-weight:bold"><?php echo $notas;?></div>
	<?php } ?>
	<br>
          <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
            <tr>
				<td style="width:20%;border-right: 2px solid #3498db"> </td>
                <td style="width:80%;text-align:left;font-family: helvetica;color:#3498db;padding:15px" colspan=2><b>CONDICIONES Y FORMA DE PAGO</b> </td>
                
			
            </tr>

			<tr>
				<td style="width:20%;border-right: 2px solid #3498db" > </td>
                <td style="width:75%;text-align:left;padding-left:15px">Condiciones de pago: <?php echo $condiciones; ?></td>
               
				
            </tr>
			<tr>
				<td style="width:20%;border-right: 2px solid #3498db" > </td>
                <td style="width:75%;text-align:left;padding-left:15px">Validez de la oferta: <?php echo $validez; ?></td>
                
				
            </tr>
			<tr>
				<td style="width:20%;border-right: 2px solid #3498db"> </td>
                <td style="width:75%;text-align:left;padding-left:15px;padding-bottom:15px">Tiempo de entrega: <?php echo $entrega; ?></td>
                
				
            </tr>
        </table>
		
	  

</page>

