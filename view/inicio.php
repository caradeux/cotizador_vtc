<!DOCTYPE html>
<html lang="es">
<head>
<?php include('head.php');?>
<link href="assets/plugins/css-chart/css-chart.css" rel="stylesheet">
<style>
/* ============================================================== */
/* DASHBOARD CORPORATIVO PROFESIONAL - VTC COTIZACIONES */
/* ============================================================== */

/* Variables CSS para consistencia */
:root {
    --corporate-primary: #1e3a8a;
    --corporate-primary-light: #3b82f6;
    --corporate-success: #059669;
    --corporate-warning: #d97706;
    --corporate-info: #0891b2;
    --corporate-danger: #dc2626;
    --corporate-gray-50: #f8fafc;
    --corporate-gray-100: #f1f5f9;
    --corporate-gray-200: #e2e8f0;
    --corporate-gray-700: #334155;
    --corporate-gray-800: #1e293b;
    --shadow-corporate: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-corporate-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

/* ============================================================== */
/* TARJETAS DE ESTADÍSTICAS CORPORATIVAS */
/* ============================================================== */

.dashboard-stats-card {
    border-radius: 16px;
    box-shadow: var(--shadow-corporate);
    transition: all 0.3s ease;
    border: none;
    overflow: hidden;
    position: relative;
    margin-bottom: 1.5rem;
    background: linear-gradient(135deg, var(--corporate-primary) 0%, var(--corporate-primary-light) 100%);
}

.dashboard-stats-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-corporate-lg);
}

.dashboard-stats-card .box {
    padding: 2rem 1.5rem;
    position: relative;
    z-index: 2;
    text-align: center;
}

.dashboard-stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
    z-index: 1;
}

.dashboard-stats-card .stat-icon {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 2.5rem;
    opacity: 0.3;
    z-index: 1;
}

.dashboard-stats-card h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 2;
    color: white;
}

.dashboard-stats-card h6 {
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 1px;
    position: relative;
    z-index: 2;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.9);
}

/* Colores específicos para cada tipo de tarjeta */
.dashboard-stats-card.card-success {
    background: linear-gradient(135deg, var(--corporate-success) 0%, #10b981 100%);
}

.dashboard-stats-card.card-primary {
    background: linear-gradient(135deg, var(--corporate-primary) 0%, var(--corporate-primary-light) 100%);
}

.dashboard-stats-card.card-info {
    background: linear-gradient(135deg, var(--corporate-info) 0%, #06b6d4 100%);
}

.dashboard-stats-card.card-warning {
    background: linear-gradient(135deg, var(--corporate-warning) 0%, #f59e0b 100%);
}

/* ============================================================== */
/* TARJETAS DE PROGRESO CORPORATIVAS */
/* ============================================================== */

.progress-stats-card {
    border-radius: 12px;
    box-shadow: var(--shadow-corporate);
    transition: all 0.3s ease;
    border: 1px solid var(--corporate-gray-200);
    background: white;
    margin-bottom: 1.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.progress-stats-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-corporate-lg);
    border-color: var(--corporate-primary-light);
}

.progress-stats-card .card-body {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.progress-stats-card .row {
    align-items: center;
    height: 100%;
}

.progress-stats-card h1 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--corporate-gray-800);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.progress-stats-card h6 {
    color: var(--corporate-gray-700);
    font-weight: 500;
    margin-bottom: 0;
    font-size: 0.875rem;
    line-height: 1.2;
}

/* ============================================================== */
/* INDICADORES CIRCULARES CORPORATIVOS */
/* ============================================================== */

.css-bar {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    background: linear-gradient(135deg, var(--corporate-primary) 0%, var(--corporate-primary-light) 100%);
    box-shadow: var(--shadow-corporate);
    transition: all 0.3s ease;
    margin: 0 auto;
}

.css-bar:hover {
    transform: scale(1.05);
    box-shadow: var(--shadow-corporate-lg);
}

/* Sobrescribir estilos del plugin css-chart */
.css-bar::after {
    display: none !important;
    content: none !important;
}

.css-bar-success {
    background: linear-gradient(135deg, var(--corporate-success) 0%, #10b981 100%);
}

.css-bar-info {
    background: linear-gradient(135deg, var(--corporate-info) 0%, #06b6d4 100%);
}

.css-bar-warning {
    background: linear-gradient(135deg, var(--corporate-warning) 0%, #f59e0b 100%);
}
    background: var(--warning-gradient);
}

/* ============================================================== */
/* SECCIÓN DE BIENVENIDA CORPORATIVA */
/* ============================================================== */

.welcome-section {
    background: linear-gradient(135deg, var(--corporate-primary) 0%, var(--corporate-primary-light) 100%);
    border-radius: 16px;
    padding: 2.5rem 2rem;
    margin-bottom: 2rem;
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-corporate-lg);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(30px, -30px);
}

.welcome-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    transform: translate(-20px, 20px);
}

.welcome-section h2 {
    font-size: 1.75rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 2;
}

.welcome-section p {
    font-size: 1rem;
    opacity: 0.9;
    margin-bottom: 0;
    position: relative;
    z-index: 2;
    font-weight: 400;
}

/* ============================================================== */
/* TÍTULOS DE PÁGINA CORPORATIVOS */
/* ============================================================== */

.page-titles {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-corporate);
    border: 1px solid var(--corporate-gray-200);
}

.page-titles h3 {
    color: var(--corporate-gray-800);
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 1.5rem;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: var(--corporate-gray-700);
    font-weight: 500;
}

.breadcrumb-item a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--secondary-color);
}

.breadcrumb-item.active {
    color: var(--medium-text);
    font-weight: 500;
}

/* ============================================================== */
/* ANIMACIONES MEJORADAS */
/* ============================================================== */

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.dashboard-stats-card,
.progress-stats-card {
    animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.dashboard-stats-card:nth-child(1) { animation-delay: 0.1s; }
.dashboard-stats-card:nth-child(2) { animation-delay: 0.2s; }
.dashboard-stats-card:nth-child(3) { animation-delay: 0.3s; }
.dashboard-stats-card:nth-child(4) { animation-delay: 0.4s; }

.progress-stats-card:nth-child(1) { animation-delay: 0.5s; }
.progress-stats-card:nth-child(2) { animation-delay: 0.6s; }
.progress-stats-card:nth-child(3) { animation-delay: 0.7s; }
.progress-stats-card:nth-child(4) { animation-delay: 0.8s; }

/* ============================================================== */
/* EFECTOS DE HOVER ADICIONALES */
/* ============================================================== */

.dashboard-stats-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
    opacity: 0.6;
}

.progress-stats-card:hover h1 {
    color: var(--primary-color);
}

/* ============================================================== */
/* GRADIENTES DE FONDO SUTILES */
/* ============================================================== */

body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
}

.page-wrapper {
    background: transparent;
}

/* ============================================================== */
/* MEJORAS RESPONSIVE */
/* ============================================================== */

@media (max-width: 768px) {
    .dashboard-stats-card .box {
        padding: 2rem 1.5rem;
    }
    
    .dashboard-stats-card h1 {
        font-size: 2.5rem;
    }
    
    .welcome-section {
        padding: 2rem 1.5rem;
    }
    
    .welcome-section h2 {
        font-size: 1.75rem;
    }
    
    .progress-stats-card .card-body {
        padding: 1.25rem;
    }
    
    .css-bar {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
    }
    
    .progress-stats-card h1 {
        font-size: 2rem;
    }
}

/* ============================================================== */
/* CORRECCIONES ESPECÍFICAS PARA VISUALIZACIÓN */
/* ============================================================== */

/* Asegurar que las cards tengan altura consistente */
.row > [class*="col-"] {
    display: flex;
    flex-direction: column;
}

/* Corregir el espaciado de las cards de progreso */
.progress-stats-card .row.pt-2.pb-2 {
    margin: 0;
    padding: 0 !important;
}

.progress-stats-card .col.pr-0 {
    padding-right: 0;
}

.progress-stats-card .col.text-right.align-self-center {
    padding-left: 0;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

/* Asegurar que las barras de progreso sean visibles */
.css-bar {
    position: relative;
    z-index: 5;
}

.css-bar i {
    z-index: 6;
    position: relative;
}

/* Corregir el contraste de texto */
.progress-stats-card h6.text-muted {
    color: var(--medium-text) !important;
}

/* ============================================================== */
/* ESTILOS ADICIONALES CORPORATIVOS */
/* ============================================================== */

/* Fondo general del dashboard */
body {
    background: var(--corporate-gray-50) !important;
}

/* Mejoras en las cards */
.card {
    overflow: hidden;
    border: 1px solid var(--corporate-gray-200);
    border-radius: 12px;
    box-shadow: var(--shadow-corporate);
}

.progress-stats-card .card-body {
    padding: 1.5rem !important;
}

/* Breadcrumbs mejorados */
.breadcrumb-item a {
    color: var(--corporate-primary) !important;
    text-decoration: none;
    font-weight: 500;
}

.breadcrumb-item a:hover {
    color: var(--corporate-primary-light) !important;
}

.breadcrumb-item.active {
    color: var(--corporate-gray-700);
    font-weight: 500;
}

/* Animaciones suaves */
.dashboard-stats-card,
.progress-stats-card,
.welcome-section,
.page-titles {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Delays para animaciones escalonadas */
.dashboard-stats-card:nth-child(1) { animation-delay: 0.1s; }
.dashboard-stats-card:nth-child(2) { animation-delay: 0.2s; }
.dashboard-stats-card:nth-child(3) { animation-delay: 0.3s; }
.dashboard-stats-card:nth-child(4) { animation-delay: 0.4s; }

.progress-stats-card:nth-child(1) { animation-delay: 0.5s; }
.progress-stats-card:nth-child(2) { animation-delay: 0.6s; }
.progress-stats-card:nth-child(3) { animation-delay: 0.7s; }
.progress-stats-card:nth-child(4) { animation-delay: 0.8s; }

/* Mejoras responsive */
@media (max-width: 768px) {
    .welcome-section {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .welcome-section h2 {
        font-size: 1.5rem;
    }
    
    .dashboard-stats-card .box {
        padding: 1.5rem 1rem;
    }
    
    .dashboard-stats-card h1 {
        font-size: 2rem;
    }
    
    .css-bar {
        width: 50px;
        height: 50px;
        font-size: 1.25rem;
    }
}

/* Hover effects mejorados */
.dashboard-stats-card:hover .stat-icon {
    transform: scale(1.1);
    opacity: 0.5;
}

.progress-stats-card:hover h1 {
    color: var(--corporate-primary);
    transition: color 0.3s ease;
}
</style>
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
                        <h3 class="text-themecolor mb-0 mt-0">Panel de Control</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                            <li class="breadcrumb-item active">Panel de Control</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Welcome Section -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="welcome-section">
                            <h2>¡Bienvenido, <?php echo $_SESSION['user_name'];?>!</h2>
                            <p>Aquí tienes un resumen completo de tu sistema de cotizaciones</p>
                        </div>
                    </div>
                </div>
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               
				<div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card dashboard-stats-card card-inverse card-success">
                            <div class="box text-center">
                                <i class="mdi mdi-briefcase-check stat-icon"></i>
                                <h1 class="font-light text-white"><?php echo counter('estimates');?></h1>
                                <h6 class="text-white">COTIZACIONES</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card dashboard-stats-card card-primary card-inverse">
                            <div class="box text-center">
                                <i class="mdi mdi-barcode stat-icon"></i>
                                <h1 class="font-light text-white"><?php echo counter('products');?></h1>
                                <h6 class="text-white">PRODUCTOS</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card dashboard-stats-card card-inverse card-info">
                            <div class="box text-center">
                                <i class="mdi mdi-star-circle stat-icon"></i>
                                <h1 class="font-light text-white"><?php echo counter('manufacturers');?></h1>
                                <h6 class="text-white">FABRICANTES</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card dashboard-stats-card card-inverse card-warning">
                            <div class="box text-center">
                                <i class="mdi mdi-account-circle stat-icon"></i>
                                <h1 class="font-light text-white"><?php echo counter('clients');?></h1>
                                <h6 class="text-white">CLIENTES</h6>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <!-- Row -->
                        <div class="row">
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card progress-stats-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col pr-0">
                                                <h1 class="font-light">
													<?php
													echo $new_cot=counterNew('estimates');
													$cot=counter('estimates');
													if ($cot > 0) {
														$percent_ct = intval(($new_cot / $cot) * 100);
													} else {
														$percent_ct = 0;
													}
													?>
												</h1>
                                                <h6 class="text-muted">Nuevas cotizaciones</h6>
                                            </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div class="css-bar mb-0 css-bar-success">
                                                    <i class="mdi mdi-briefcase-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card progress-stats-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col pr-0">
                                                <h1 class="font-light">
												<?php
												echo $new_cot=counterNew('products');
												$cot=counter('products');
												if ($cot > 0) {
													$percent_ct = intval(($new_cot / $cot) * 100);
												} else {
													$percent_ct = 0;
												}
												?>
												</h1>
                                                <h6 class="text-muted">Nuevos productos</h6>
                                            </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div class="css-bar mb-0 css-bar-info">
                                                    <i class="mdi mdi-barcode"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card progress-stats-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col pr-0">
                                                <h1 class="font-light">
												<?php
													echo $new_cot=counterNew('manufacturers');
													$cot=counter('manufacturers');
													if ($cot > 0) {
														$percent_ct = intval(($new_cot / $cot) * 100);
													} else {
														$percent_ct = 0;
													}
												?>
												</h1>
                                                <h6 class="text-muted">Nuevos fabricantes</h6>
                                            </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div class="css-bar mb-0 css-bar-info">
                                                    <i class="mdi mdi-star-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card progress-stats-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col pr-0">
                                                <h1 class="font-light">
												<?php
												echo $new_cot=counterNew('clients');
												$cot=counter('clients');
												if ($cot > 0) {
													$percent_ct = intval(($new_cot / $cot) * 100);
												} else {
													$percent_ct = 0;
												}
												?>
												</h1>
                                                <h6 class="text-muted">Nuevos clientes</h6>
                                            </div>
                                            <!-- Column -->
                                            <div class="col text-right align-self-center">
                                                <div class="css-bar mb-0 css-bar-warning">
                                                    <i class="mdi mdi-account-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
	
	
	</body>
</html>
