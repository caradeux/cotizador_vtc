<!DOCTYPE html>
<html lang="es">
<head>
<?php include('head.php');?>
<link href="assets/plugins/css-chart/css-chart.css" rel="stylesheet">
<style>
/* ============================================================== */
/* PALETA DE COLORES MEJORADA - DISEÑO MODERNO 2024 */
/* ============================================================== */

:root {
    /* Colores principales - Paleta moderna */
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --info-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    --danger-gradient: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    
    /* Colores sólidos modernos */
    --primary-color: #667eea;
    --secondary-color: #f093fb;
    --success-color: #4facfe;
    --info-color: #43e97b;
    --warning-color: #fa709a;
    --danger-color: #ff9a9e;
    
    /* Colores neutros mejorados */
    --dark-text: #2d3748;
    --medium-text: #4a5568;
    --light-text: #718096;
    --lighter-text: #a0aec0;
    
    /* Fondos y superficies */
    --bg-primary: #ffffff;
    --bg-secondary: #f7fafc;
    --bg-tertiary: #edf2f7;
    --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    
    /* Sombras modernas */
    --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-heavy: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    
    /* Bordes y radios */
    --border-radius-sm: 8px;
    --border-radius-md: 12px;
    --border-radius-lg: 16px;
    --border-radius-xl: 20px;
}

/* ============================================================== */
/* ESTILOS MEJORADOS CON NUEVA PALETA */
/* ============================================================== */

.dashboard-stats-card {
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-medium);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    overflow: hidden;
    position: relative;
    margin-bottom: 1.5rem;
}

.dashboard-stats-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-heavy);
}

.dashboard-stats-card .box {
    padding: 2.5rem 2rem;
    position: relative;
    z-index: 2;
}

.dashboard-stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
    z-index: 1;
}

.dashboard-stats-card .stat-icon {
    position: absolute;
    top: 25px;
    right: 25px;
    font-size: 3.5rem;
    opacity: 0.4;
    z-index: 1;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
}

.dashboard-stats-card h1 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 0.75rem;
    position: relative;
    z-index: 2;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.dashboard-stats-card h6 {
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    position: relative;
    z-index: 2;
    text-transform: uppercase;
}

/* Cards de estadísticas con nuevos colores */
.dashboard-stats-card.card-success {
    background: var(--success-gradient);
}

.dashboard-stats-card.card-primary {
    background: var(--primary-gradient);
}

.dashboard-stats-card.card-info {
    background: var(--info-gradient);
}

.dashboard-stats-card.card-warning {
    background: var(--warning-gradient);
}

/* ============================================================== */
/* CARDS DE PROGRESO CORREGIDAS */
/* ============================================================== */

.progress-stats-card {
    border-radius: var(--border-radius-md);
    box-shadow: var(--shadow-light);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
    border: 1px solid rgba(226, 232, 240, 0.8);
    margin-bottom: 1.5rem;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.progress-stats-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
    border-color: rgba(226, 232, 240, 1);
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
    font-size: 2.25rem;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.progress-stats-card h6 {
    color: var(--medium-text);
    font-weight: 500;
    margin-bottom: 0;
    font-size: 0.9rem;
    line-height: 1.2;
}

/* ============================================================== */
/* BARRAS DE PROGRESO CORREGIDAS */
/* ============================================================== */

.css-bar {
    position: relative;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.75rem;
    color: white;
    background: var(--primary-gradient);
    box-shadow: var(--shadow-medium);
    transition: all 0.3s ease;
    margin: 0 auto;
}

.css-bar:hover {
    transform: scale(1.1);
    box-shadow: var(--shadow-heavy);
}

/* SOBRESCRIBIR EL PSEUDO-ELEMENTO ::AFTER DEL ARCHIVO CSS-CHART.CSS */
.css-bar::after {
    display: none !important;
    content: none !important;
}

.css-bar-success {
    background: var(--success-gradient);
}

.css-bar-info {
    background: var(--info-gradient);
}

.css-bar-warning {
    background: var(--warning-gradient);
}

/* ============================================================== */
/* SECCIÓN DE BIENVENIDA MEJORADA */
/* ============================================================== */

.welcome-section {
    background: var(--primary-gradient);
    border-radius: var(--border-radius-xl);
    padding: 3rem 2.5rem;
    margin-bottom: 2.5rem;
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
}

.welcome-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
    animation: float 8s ease-in-out infinite;
}

.welcome-section::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: -20px;
    width: 100px;
    height: 100px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    animation: pulse 4s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(180deg); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.2); opacity: 0.6; }
}

.welcome-section h2 {
    font-size: 2.25rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    position: relative;
    z-index: 2;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.welcome-section p {
    font-size: 1.1rem;
    opacity: 0.95;
    margin-bottom: 0;
    position: relative;
    z-index: 2;
    font-weight: 400;
}

/* ============================================================== */
/* TÍTULOS DE PÁGINA MEJORADOS */
/* ============================================================== */

.page-titles {
    background: var(--bg-gradient);
    border-radius: var(--border-radius-md);
    padding: 2rem 1.5rem;
    margin-bottom: 2.5rem;
    box-shadow: var(--shadow-light);
    border: 1px solid rgba(226, 232, 240, 0.8);
}

.page-titles h3 {
    color: var(--dark-text);
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 1.5rem;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: var(--light-text);
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

/* Asegurar que las cards tengan el padding correcto */
.card {
    overflow: hidden;
}

.progress-stats-card .card-body {
    padding: 1.5rem !important;
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
