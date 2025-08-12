<?php
	$sql_monedas=mysqli_query($con,"select id_moneda from empresa where id_empresa=1");
	$rw=mysqli_fetch_array($sql_monedas);
	$id_moneda=$rw['id_moneda'];
	
	//Posible 
	$sql_cotizacion=mysqli_query($con, "select LAST_INSERT_ID(numero_cotizacion) as last from estimates order by id_cotizacion desc limit 0,1 ");
	$rwC=mysqli_fetch_array($sql_cotizacion);
	$numero=$rwC['last']+1;	
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include('head.php');?>
<!-- summernotes CSS -->
<link href="assets/plugins/summernote/dist/summernote-bs4.css" rel="stylesheet" />
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
		<?php include('header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
		<?php include('left-sidebar.php');?>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor mb-0 mt-0">Cotizaciones</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
							<li class="breadcrumb-item ">Cotizaciones</li>
							<li class="breadcrumb-item active">Nueva</li>
                        </ol>
                    </div>
					
					
                    
                </div>
				
				
				
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				<?php
					if ($permisos_editar==1){
						include("modal/buscar_productos.php");	
						include("modal/editar_item.php");
						include("modal/registro_productos.php");
						include("modal/registro_clientes.php");
						
					}
				?>
				<?php 
					if ($permisos_ver==1){
				?>
				
				<div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>COTIZACIÓN</b> <span class="float-right">#<?php echo $numero;?></span></h3>
                            <hr>
							 
								
								
							<form class="needs-validations"   id="datos_cotizacion" >
							
							<div class="row">
								<div class="col-md-3">
									<label>Cliente</label>	
								  <input type="text" class="form-control" id="nombre_cliente" placeholder="" required>
								  <input id="id_cliente" name="id_cliente" type='hidden' value="" >
									<div class="invalid-feedback">
                                         Debes seleccionar el cliente.
                                    </div>
								</div>
								
								<div class="col-md-3">
									<label>Atención</label>	
									
									<select class='form-control' id="atencion" name="atencion" >
										<option value="">Selecciona</option>
									
									</select>
								
								</div>
								<div class="col-md-3">
									<label>Teléfono de contacto</label>	
									<input type="text" class="form-control " id="tel1" placeholder="" value="" readonly>	
									
								</div>
								
								<div class="col-md-3">
									<label>E-mail de contacto</label>	
									<input type="text" class="form-control " id="email_contact" placeholder="" value="" readonly>
									
								</div>
							</div>
							
                            <div class="row">
								<div class="col-md-4">
									<label>Condiciones de pago</label>
									<input type="text" class="form-control" id="condiciones" name="condiciones" placeholder="Condiciones de pago" value="Contado" required>
									<div class="invalid-feedback">
                                         Condiciones de pago es requerido.
                                    </div>
								</div>
								<div class="col-md-4">
									<label>Validéz de la oferta</label>
									<input type="text" class="form-control" id="validez" name="validez" placeholder="Validéz de la oferta" value="" required >
									<div class="invalid-feedback">
                                         Validéz de la oferta es requerido.
                                    </div>
								</div>
								<div class="col-md-4">
									<label>Tiempo de entrega</label>
									<input type="text" class="form-control" id="entrega" name="entrega" placeholder="Tiempo de entrega" value="" required >
									<div class="invalid-feedback">
                                         Tiempo de entrega es requerido.
                                    </div>
								</div>
							
							</div>

							<div class="row">
								<div class="col-md-7">
									<label>Nota</label>
									<input type="text" class="form-control " id="notas" name="notas" placeholder="Nota" maxlength='255' >
								</div>
								
								<div class="col-md-2">
									<label>Plantilla</label>
									<?php
										$sql_plantillas=mysqli_query($con,"select * from plantillas order by id asc");
									?>
									<select name="id_plantilla" id="id_plantilla" class='form-control'>
									<?php 
										while ($rwP=mysqli_fetch_array($sql_plantillas)){
											$id_plantilla=$rwP['id'];
											$plantilla=$rwP['name'];
											$status_plantilla=$rwP['status'];
											if ($status_plantilla==1){$s1="selected";}
											else {$s1="";}
											echo "<option value='$id_plantilla' $s1>$plantilla</option>";
										}
									?>
									</select>									
								</div>
								
								
								
								<div class="col-md-3">
									<label>Moneda</label>
									<select name="moneda" id="moneda" class='form-control input-sm' >
										<?php 
											$sql_monedas=mysqli_query($con,"select id, name from currencies order by id");
											while ($rw=mysqli_fetch_array($sql_monedas)){
												?>
												<option value="<?php echo $rw['id']?>" <?php if($id_moneda==$rw['id']){echo "selected";}?>><?php echo $rw['name']?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12 text-right">
								
								<div class="btn-group" role="group" aria-label="Basic example">
								  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addModalClient">
										 <span class="fa fa-plus"></span> Nuevo cliente
										</button>
								  <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addModalProduct">
										 <span class="fa fa-plus"></span> Nuevo producto
										</button>
								  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
										 <span class="fa fa-search"></span> Buscar productos
										</button>
										
										
										<button type="submit" class="btn  btn-success" >
										  <span class="fa fa-save"></span> Guardar  
										</button>
								</div>



									<div class="float-right">
										
										
										
										
										
										
									</div>	
								</div>
							</div>
							
							
							<div class="row">
								<div id="resultados2"  class="col-md-12" style="margin-top:10px"></div><!-- Carga los datos ajax -->
								<div id="resultados"  class="col-md-12" style="margin-top:10px"></div><!-- Carga los datos ajax -->
							</div>
							
							</form>	
							
							
                        </div>
                    </div>
                </div>
				<?php		
						
					} else {
						include("no_access.php");
					}
				?>
				

				
               
				
				
				
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <?php include ("footer.php");?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	
	<?php include('js.php');?>
	
    <script type="text/javascript" src="assets/js/VentanaCentrada.js"></script>
	
	<script type="text/javascript" src="assets/js/nueva_cotizacion.js"></script>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>

	
 </body>
</html>
