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
                        <h3 class="text-themecolor mb-0 mt-0">Productos</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item">Catálogo</li>
							<li class="breadcrumb-item active">Productos</li>
                        </ol>
                    </div>
					
					 <div class="col-md-6 col-4 align-self-center">
						
                        <button class="btn float-right  btn-success" data-toggle="modal" data-target="#addModalProduct"><i class="mdi mdi-plus-circle"></i> <span class='hidden-sm-down'>Nuevo</span></button>
                        <div class="dropdown float-right m-r-10 hidden-sm-down">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Importar datos </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;"> 
								
								<a class="dropdown-item" href="#importar_modal" data-toggle="modal"><i class="mdi mdi-file-excel"></i> Hoja de cálculo</a>
								<a class="dropdown-item" href="assets/template/formato_importacion_productos.xlsx" ><i class="mdi mdi-download"></i> Descargar formato</a>
								 
							</div>
                        </div>
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
						include("modal/registro_productos.php");
						include("modal/editar_productos.php");
						include("modal/importar_productos.php");
					}
				?>
				<?php 
					if ($permisos_ver==1){
				?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Buscar productos</h4>
                                  <div class="row">
                                    <div class="col-md-3 nopadding">
										<input type="text" class="form-control" id="q" placeholder="Buscar por el código" onkeyup='load(1);'>
									</div>

									<div class="col-md-4 nopadding">
										<input type="text" class="form-control" id="q2" placeholder="Buscar por el nombre" onkeyup='load(1);'>
									</div>
                                    <div class="col-md-4 nopadding">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
											
												<select class="form-control" id="q3" onchange="load(1);">
													<option value="">Selecciona fabricante</option>
													<?php 
														$query=mysqli_query($con,"select * from manufacturers order by nombre_marca");
														while($rw=mysqli_fetch_array($query)){
															?>
															<option value="<?php echo $rw['id_marca'];?>"><?php echo $rw['nombre_marca'];?></option>
															<?php
														}
													?>
												</select>
												
												<span class="input-group-btn input-group-append">
													<button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button" onclick="load(1);"><i class='fa fa-search'></i> Buscar</button>
												</span>
											</div>
                                                
                                            </div>
                                        </div>
                                    </div>
									<div class="col-md-1">
										<span id="loader"></span>
									</div>
									
									
									
									
									
									
									
                                </div>
								<div class="row">

									<div id="resultados" class='col-sm-12 '></div><!-- Carga los datos ajax -->
									<div class='outer_div' class='col-sm-12 ' style="width:100%"></div><!-- Carga los datos ajax -->
								</div>
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
	<script src="assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
	<script type="text/javascript" src="assets/js/productos.js"></script>
	
 </body>
</html>
