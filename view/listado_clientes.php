<!DOCTYPE html>
<html lang="es">
<head>
<?php include('head.php');?>
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
                        <h3 class="text-themecolor mb-0 mt-0"><i class="fa fa-users text-primary mr-2"></i>Clientes</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Clientes</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#addModalClient"><i class="mdi mdi-plus-circle mr-1"></i> Nuevo cliente</button>
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
						include("modal/registro_clientes.php");
						include("modal/editar_clientes.php");
						include("modal/registro_contactos.php");
						include("modal/editar_contactos.php");
					}
				?>
				<?php 
					if ($permisos_ver==1){
				?>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h4 class="card-title mb-0"><i class="fa fa-search mr-2"></i>Buscar Clientes</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="q" class="font-weight-bold">Buscar</label>
                                        <div class="input-group">
                                            <input id="q" type="text" name="q" class="form-control" placeholder="Buscar por nombre o razón social" onkeyup='load(1);'>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" onclick="load(1);"><i class='fa fa-search'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                                        <span id="loader"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="resultados" class='col-12'></div>
                                    <div class='outer_div col-12' style="width:100%"></div>
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
	<script type="text/javascript" src="assets/js/clientes.js"></script>
	
 </body>
</html>
