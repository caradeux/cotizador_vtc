<?php
	if (isset($_POST['guardar']))
		{	
			if ($permisos_editar==1){
				include("./libraries/empresa.php");
			}
		}
	/*Datos de la empresa*/
	$sql_empresa=mysqli_query($con,"SELECT * FROM empresa where id_empresa=1");
	$rw_empresa=mysqli_fetch_array($sql_empresa);
	$iva=$rw_empresa["iva"];
	$impuesto=($iva/100) + 1;
	$id_moneda=$rw_empresa["id_moneda"];
	$nrc=$rw_empresa["nrc"];
	$nombre_empresa=$rw_empresa["nombre"];
	$propietario=$rw_empresa["propietario"];
	$giro=$rw_empresa["giro"];
	$direccion=$rw_empresa["direccion"];
	$telefono=$rw_empresa["telefono"];
	$email=$rw_empresa["email"];
	$logo_url=$rw_empresa["logo_url"];
	/*Fin datos empresa*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
<link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
</head>

<body class="fix-header card-no-border ">
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
                        <h3 class="text-themecolor mb-0 mt-0">Configurar datos de la empresa</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item ">Configuración</li>
							<li class="breadcrumb-item active">Configurar datos de la empresa</li>
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
					if ($permisos_ver==1){
				?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Configuración</h4>
								
							<?php 
										if (isset($errors)){
											?>
										<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Error! </strong>
											<?php
											foreach ($errors as $error){
													echo $error;
												}
											?>
										</div>	
											<?php
										}
									?>
									<?php 
										if (isset($messages)){
											?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Aviso! </strong>
											<?php
											foreach ($messages as $message){
													echo $message;
												}
											?>
										</div>	
											<?php
										}
									?>	

									
							<form  role="form" enctype="multipart/form-data" method="post" >	
                              <div class="row">
								<div class="col-xs-12 col-md-6 form-group">
									<label>Nombre o Razón Social</label>
									<input type="text" name="nombre" id="nombre"  class="form-control" maxlength="150" value="<?php echo $nombre_empresa;?>" required>
								</div>
								<div class="col-xs-12 col-md-6 form-group">
									<label>Actividad económica</label>
									<input class="form-control" name="giro" id="giro" type="text" value="<?php echo $giro;?>" maxlength="150" required/>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-md-6 form-group">
									<label>Propietario</label>
									<input class="form-control" name="propietario" id="propietario"  type="text" value="<?php echo $propietario;?>" maxlength="60" required/>
								</div>
								<div class="col-xs-12 col-md-6 form-group">
									<label>Nº de Registro fiscal</label>
									<input class="form-control" name="nrc" id="nrc" type="text" value="<?php echo $nrc?>" maxlength="15" required/>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-md-6 form-group">
									<label>Dirección</label>
									<textarea class="form-control" name="direccion" id="direccion" maxlength='255' required><?php echo $direccion;?></textarea>
								</div>
								
								<div class="col-xs-12 col-md-6 form-group">
									<label>Selecciona moneda</label>
									<select name="moneda" id="moneda" class='form-control'>
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
							
							<div class="row">
								<div class="col-xs-12 col-md-6 form-group">
									<label>Teléfono</label>
									<input class="form-control" name="telefono" id="telefono" type="text" value="<?php echo $telefono;?>" maxlength='30' required/>
									
									<label>Correo electrónico</label>
									<input class="form-control" name="email" id="email" type="email" value="<?php echo $email;?>" maxlength='64' required/>
								</div>
								
								<div class="col-xs-12 col-md-6 form-group">
									<label style="display:block;">Logo</label>
									<input type="file" id="input-file-now-custom-1" name="imagefile" class="dropify" data-default-file="<?php echo $logo_url;?>" />
									
								</div>
								
							</div>
							
							<div class="row">
								
								
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-md-6 form-group">
									
								</div>
								<?php
								if ($permisos_editar==1){
								?>	
								<div class="col-xs-12 col-md-6 form-group">
									
									<button type="submit" class="btn btn-primary" name="guardar">Guardar datos</button>
								</div>
								<?php } else 
								{
									echo "<div class='col-xs-12'><div class='alert alert-info'>Solo tienes permisos para ver este módulo.</div></div>";										
								}
								?>
							</div>
							
					</form>		
							
								
                            </div>
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
	<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
	<script>
    $(document).ready(function() {
        // Basic
       ;
		
		
		$('.dropify').dropify({
			messages: {
				'default': 'Arrastrar y soltar una imagen o click aquí.',
				'replace': 'Arrastra y suelta o haz clic para reemplazar.',
				'remove':  'Borrar',
				'error':   'Vaya, algo mal pasó.'
			}
		});

       
        
    });
    </script>
	
 </body>
</html>
