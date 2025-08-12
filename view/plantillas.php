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
                        <h3 class="text-themecolor mb-0 mt-0">Configurar plantillas</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item ">Configuración</li>
							<li class="breadcrumb-item active">Plantillas</li>
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
                                <h4 class="card-title">Plantillas</h4>
							<div class='row'>	
							<h2>Selecciona una plantilla por defecto</h2>
							<div id='resultados_ajax' class='col-md-12'></div>
							
							<?php
								$n=1;
								$sql=mysqli_query($con,"select * from plantillas order by id");
								while($rw=mysqli_fetch_array($sql)){
									$status=$rw['status'];
							?>
										
							<div class="col-xs-6 col-md-4 text-center">
								<a href="#" class="thumbnail" data-toggle="modal" data-target="#imagemodal" data-url="assets/images/preview/<?php echo $rw['image'];?>" data-title="<?php echo $rw['name'];?>">
								  <img src="assets/images/preview/<?php echo $rw['image'];?>" alt="..." class='img-responsive'>
								</a>
								<hr>
								<input type="radio" name="id_plantilla" id="id_plantilla" value="<?php echo $rw['id'];?>" <?php if ($status== 1){echo "checked";}?> > <?php echo $rw['name'];?>
								<hr>
							  </div>
							<?php
							if ($n%4==0){
								echo "<div class='clearfix'></div>";
							}
							$n++;
								}
						?>	

								<div class="col-md-12 text-center">
								
									<button type="button" class="btn btn-success" onclick="updateProfile();"><i class="fa fa-refresh"></i> Actualizar datos</button>
									
								</div>	
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
				

				<!-- Creates the bootstrap modal where the image will appear -->
				<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						
						<h4 class="modal-title" id="myModalLabel">Image preview</h4>
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  </div>
					  <div class="modal-body">
						<img src="" id="imagepreview" style="width: 100%" >
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					  </div>
					</div>
				  </div>
				</div>
		
		
               
				
				
				
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

	<script>
		function updateProfile(){
			id_plantilla =$('#id_plantilla:checked').val();
			var parametros = {"id_plantilla":id_plantilla };
			 $.ajax({
				type: "POST",
				url: "ajax/editar_plantilla.php",
				data: parametros,
				 beforeSend: function(objeto){
					$("#resultados_ajax").html("Mensaje: Cargando...");
				  },
				success: function(datos){
				$("#resultados_ajax").html(datos);
			  }
			});
		}
		$('#imagemodal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var url = button.data('url')
		  var title = button.data('title')
		  var modal = $(this)
		  modal.find('.modal-title').text(title)
		  $('#imagepreview').attr('src', url);
		})
	</script>
	
 </body>
</html>
