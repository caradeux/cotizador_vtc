<?php
	if (isset($_GET['type']) and $_GET['type']==1){
		$_SESSION['seller']=$_SESSION['user_id'];
	} else {
		$_SESSION['seller']="";
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include('head.php');?>
<link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
<style>
/* ============================================================== */
/* ESTILOS COMPLEMENTARIOS PARA BOOTSTRAP */
/* ============================================================== */

:root {
    --primary-color: #007bff;
    --secondary-color: #6c757d;
    --success-color: #28a745;
    --info-color: #17a2b8;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --light-color: #f8f9fa;
    --dark-color: #343a40;
}

/* ============================================================== */
/* MEJORAS PARA COMPONENTES BOOTSTRAP */
/* ============================================================== */

.card {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.card-header {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
    border: none;
    border-radius: 0.375rem 0.375rem 0 0 !important;
    padding: 1rem 1.5rem;
}

.card-body {
    padding: 2rem;
}

/* ============================================================== */
/* FORMULARIOS BOOTSTRAP MEJORADOS */
/* ============================================================== */

.form-control {
    border-radius: 0.375rem;
    border: 1px solid #ced4da;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    transform: translateY(-1px);
}

.form-control:read-only {
    background-color: #f8f9fa;
    color: #6c757d;
    cursor: not-allowed;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.5rem;
}

/* ============================================================== */
/* BOTONES BOOTSTRAP MEJORADOS */
/* ============================================================== */

.btn {
    border-radius: 0.375rem;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.btn-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
}

.btn-info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
    border: none;
}

.btn-info:hover {
    background: linear-gradient(135deg, #138496 0%, #117a8b 100%);
}

.btn-light {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid #dee2e6;
    color: #495057;
}

.btn-light:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    border-color: #007bff;
    color: #007bff;
}

.btn-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
    border: none;
}

.btn-secondary:hover {
    background: linear-gradient(135deg, #5a6268 0%, #545b62 100%);
}

.btn-success {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
    border: none;
}

.btn-success:hover {
    background: linear-gradient(135deg, #1e7e34 0%, #1c7430 100%);
}

/* ============================================================== */
/* BREADCRUMB BOOTSTRAP MEJORADO */
/* ============================================================== */

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: #6c757d;
    font-weight: 500;
}

.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #6c757d;
    font-weight: 500;
}

/* ============================================================== */
/* ALERTAS Y NOTIFICACIONES */
/* ============================================================== */

.alert {
    border: none;
    border-radius: 0.375rem;
    padding: 1rem 1.5rem;
    margin-bottom: 1rem;
}

.alert-primary {
    background: linear-gradient(135deg, #cce7ff 0%, #b3d9ff 100%);
    color: #004085;
}

.alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
}

.alert-warning {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    color: #856404;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
}

/* ============================================================== */
/* TABLAS BOOTSTRAP MEJORADAS */
/* ============================================================== */

.table {
    border-radius: 0.375rem;
    overflow: hidden;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.table thead th {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: none;
    color: #495057;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    padding: 1rem 0.75rem;
    border-bottom: 2px solid #dee2e6;
}

.table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f8f9fa;
}

.table tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
    transform: translateX(2px);
}

.table tbody td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border: none;
    color: #495057;
}

/* ============================================================== */
/* BADGES Y ESTADOS */
/* ============================================================== */

.badge {
    padding: 0.5rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.badge-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

.badge-success {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
}

.badge-warning {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    color: #212529;
}

.badge-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.badge-info {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.badge-light {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    color: #495057;
    border: 1px solid #dee2e6;
}

/* ============================================================== */
/* MODALES BOOTSTRAP MEJORADOS */
/* ============================================================== */

.modal-content {
    border: none;
    border-radius: 0.5rem;
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
}

.modal-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-bottom: 1px solid #dee2e6;
    border-radius: 0.5rem 0.5rem 0 0;
}

.modal-title {
    color: #495057;
    font-weight: 600;
}

.modal-footer {
    border-top: 1px solid #dee2e6;
    background: #f8f9fa;
    border-radius: 0 0 0.5rem 0.5rem;
}

/* ============================================================== */
/* NAVEGACIÓN Y PAGINACIÓN */
/* ============================================================== */

.nav-tabs {
    border-bottom: 2px solid #dee2e6;
}

.nav-tabs .nav-link {
    border: none;
    border-radius: 0.375rem 0.375rem 0 0;
    color: #6c757d;
    font-weight: 500;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link:hover {
    border: none;
    color: #007bff;
    background-color: rgba(0, 123, 255, 0.1);
}

.nav-tabs .nav-link.active {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
    border: none;
}

.pagination {
    margin: 0;
}

.page-link {
    border: none;
    color: #007bff;
    padding: 0.75rem 1rem;
    margin: 0 0.125rem;
    border-radius: 0.375rem;
    transition: all 0.3s ease;
}

.page-link:hover {
    background-color: #007bff;
    color: white;
    transform: translateY(-1px);
}

.page-item.active .page-link {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border: none;
}

/* ============================================================== */
/* RESPONSIVE MEJORADO */
/* ============================================================== */

@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 0.5rem;
    }
    
    .table-responsive {
        border-radius: 0.375rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
}

/* ============================================================== */
/* ANIMACIONES Y EFECTOS */
/* ============================================================== */

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card {
    animation: fadeInUp 0.6s ease;
}

/* ============================================================== */
/* UTILIDADES ADICIONALES */
/* ============================================================== */

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.shadow {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.shadow-lg {
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
}

.rounded-lg {
    border-radius: 0.5rem !important;
}

.rounded-xl {
    border-radius: 0.75rem !important;
}

/* ============================================================== */
/* MEJORAS PARA FORM-SELECT (Bootstrap 4.2.1) */
/* ============================================================== */

.form-select {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.form-select:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.form-select:disabled {
    color: #6c757d;
    background-color: #e9ecef;
}

/* ============================================================== */
/* MEJORAS PARA GAP (Bootstrap 4.2.1) */
/* ============================================================== */

.gap-1 {
    gap: 0.25rem !important;
}

.gap-2 {
    gap: 0.5rem !important;
}

.gap-3 {
    gap: 1rem !important;
}

.gap-4 {
    gap: 1.5rem !important;
}

.gap-5 {
    gap: 3rem !important;
}

/* ============================================================== */
/* MEJORAS PARA MARGIN Y PADDING */
/* ============================================================== */

.me-1 {
    margin-right: 0.25rem !important;
}

.me-2 {
    margin-right: 0.5rem !important;
}

.me-3 {
    margin-right: 1rem !important;
}

.me-4 {
    margin-right: 1.5rem !important;
}

.me-5 {
    margin-right: 3rem !important;
}

.ms-1 {
    margin-left: 0.25rem !important;
}

.ms-2 {
    margin-left: 0.5rem !important;
}

.ms-3 {
    margin-left: 1rem !important;
}

.ms-4 {
    margin-left: 1.5rem !important;
}

.ms-5 {
    margin-left: 3rem !important;
}

.mb-0 {
    margin-bottom: 0 !important;
}

.mb-1 {
    margin-bottom: 0.25rem !important;
}

.mb-2 {
    margin-bottom: 0.5rem !important;
}

.mb-3 {
    margin-bottom: 1rem !important;
}

.mb-4 {
    margin-bottom: 1.5rem !important;
}

.mb-5 {
    margin-bottom: 3rem !important;
}

/* ============================================================== */
/* MEJORAS PARA FLEXBOX */
/* ============================================================== */

.d-flex {
    display: flex !important;
}

.justify-content-end {
    justify-content: flex-end !important;
}

.justify-content-center {
    justify-content: center !important;
}

.justify-content-between {
    justify-content: space-between !important;
}

.align-items-center {
    align-items: center !important;
}

.flex-wrap {
    flex-wrap: wrap !important;
}

/* ============================================================== */
/* MEJORAS PARA TEXT */
/* ============================================================== */

.text-primary {
    color: #007bff !important;
}

.text-center {
    text-align: center !important;
}

.text-right {
    text-align: right !important;
}

.text-left {
    text-align: left !important;
}

/* ============================================================== */
/* MEJORAS PARA BACKGROUND */
/* ============================================================== */

.bg-primary {
    background-color: #007bff !important;
}

.bg-secondary {
    background-color: #6c757d !important;
}

.bg-success {
    background-color: #28a745 !important;
}

.bg-info {
    background-color: #17a2b8 !important;
}

.bg-warning {
    background-color: #ffc107 !important;
}

.bg-danger {
    background-color: #dc3545 !important;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.bg-dark {
    background-color: #343a40 !important;
}

/* ============================================================== */
/* MEJORAS PARA BORDERS */
/* ============================================================== */

.border-0 {
    border: 0 !important;
}

.border-primary {
    border-color: #007bff !important;
}

.border-secondary {
    border-color: #6c757d !important;
}

.border-success {
    border-color: #28a745 !important;
}

.border-info {
    border-color: #17a2b8 !important;
}

.border-warning {
    border-color: #ffc107 !important;
}

.border-danger {
    border-color: #dc3545 !important;
}

.border-light {
    border-color: #f8f9fa !important;
}

.border-dark {
    border-color: #343a40 !important;
}

/* ============================================================== */
/* MEJORAS PARA POSITION */
/* ============================================================== */

.position-relative {
    position: relative !important;
}

.position-absolute {
    position: absolute !important;
}

.position-fixed {
    position: fixed !important;
}

.position-sticky {
    position: sticky !important;
}

/* ============================================================== */
/* MEJORAS PARA OVERFLOW */
/* ============================================================== */

.overflow-hidden {
    overflow: hidden !important;
}

.overflow-auto {
    overflow: auto !important;
}

.overflow-scroll {
    overflow: scroll !important;
}

/* ============================================================== */
/* MEJORAS PARA WIDTH Y HEIGHT */
/* ============================================================== */

.w-100 {
    width: 100% !important;
}

.w-75 {
    width: 75% !important;
}

.w-50 {
    width: 50% !important;
}

.w-25 {
    width: 25% !important;
}

.h-100 {
    height: 100% !important;
}

.h-75 {
    height: 75% !important;
}

.h-50 {
    height: 50% !important;
}

.h-25 {
    height: 25% !important;
}

/* ============================================================== */
/* MEJORAS PARA DISPLAY */
/* ============================================================== */

.d-none {
    display: none !important;
}

.d-block {
    display: block !important;
}

.d-inline {
    display: inline !important;
}

.d-inline-block {
    display: inline-block !important;
}

.d-table {
    display: table !important;
}

.d-table-row {
    display: table-row !important;
}

.d-table-cell {
    display: table-cell !important;
}

/* ============================================================== */
/* MEJORAS PARA VISIBILITY */
/* ============================================================== */

.visible {
    visibility: visible !important;
}

.invisible {
    visibility: hidden !important;
}

/* ============================================================== */
/* MEJORAS PARA OPACITY */
/* ============================================================== */

.opacity-0 {
    opacity: 0 !important;
}

.opacity-25 {
    opacity: 0.25 !important;
}

.opacity-50 {
    opacity: 0.5 !important;
}

.opacity-75 {
    opacity: 0.75 !important;
}

.opacity-100 {
    opacity: 1 !important;
}

/* ============================================================== */
/* MEJORAS PARA TRANSFORM */
/* ============================================================== */

.transform-none {
    transform: none !important;
}

.transform-rotate-45 {
    transform: rotate(45deg) !important;
}

.transform-rotate-90 {
    transform: rotate(90deg) !important;
}

.transform-rotate-180 {
    transform: rotate(180deg) !important;
}

.transform-scale-0 {
    transform: scale(0) !important;
}

.transform-scale-50 {
    transform: scale(0.5) !important;
}

.transform-scale-75 {
    transform: scale(0.75) !important;
}

.transform-scale-100 {
    transform: scale(1) !important;
}

.transform-scale-125 {
    transform: scale(1.25) !important;
}

.transform-scale-150 {
    transform: scale(1.5) !important;
}

/* ============================================================== */
/* MEJORAS PARA TRANSITION */
/* ============================================================== */

.transition {
    transition: all 0.3s ease !important;
}

.transition-none {
    transition: none !important;
}

.transition-all {
    transition: all 0.3s ease !important;
}

.transition-colors {
    transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease !important;
}

.transition-opacity {
    transition: opacity 0.3s ease !important;
}

.transition-shadow {
    transition: box-shadow 0.3s ease !important;
}

.transition-transform {
    transition: transform 0.3s ease !important;
}

/* ============================================================== */
/* MEJORAS PARA CURSOR */
/* ============================================================== */

.cursor-pointer {
    cursor: pointer !important;
}

.cursor-default {
    cursor: default !important;
}

.cursor-not-allowed {
    cursor: not-allowed !important;
}

.cursor-help {
    cursor: help !important;
}

.cursor-move {
    cursor: move !important;
}

.cursor-text {
    cursor: text !important;
}

.cursor-wait {
    cursor: wait !important;
}

/* ============================================================== */
/* MEJORAS PARA USER SELECT */
/* ============================================================== */

.user-select-none {
    -webkit-user-select: none !important;
    -moz-user-select: none !important;
    -ms-user-select: none !important;
    user-select: none !important;
}

.user-select-auto {
    -webkit-user-select: auto !important;
    -moz-user-select: auto !important;
    -ms-user-select: auto !important;
    user-select: auto !important;
}

.user-select-all {
    -webkit-user-select: all !important;
    -moz-user-select: all !important;
    -ms-user-select: all !important;
    user-select: all !important;
}

.user-select-text {
    -webkit-user-select: text !important;
    -moz-user-select: text !important;
    -ms-user-select: text !important;
    user-select: text !important;
}

/* ============================================================== */
/* MEJORAS PARA POINTER EVENTS */
/* ============================================================== */

.pointer-events-none {
    pointer-events: none !important;
}

.pointer-events-auto {
    pointer-events: auto !important;
}

/* ============================================================== */
/* MEJORAS PARA RESIZE */
/* ============================================================== */

.resize-none {
    resize: none !important;
}

.resize-y {
    resize: vertical !important;
}

.resize-x {
    resize: horizontal !important;
}

.resize {
    resize: both !important;
}

/* ============================================================== */
/* MEJORAS PARA SCROLL */
/* ============================================================== */

.scroll-auto {
    scroll-behavior: auto !important;
}

.scroll-smooth {
    scroll-behavior: smooth !important;
}

/* ============================================================== */
/* MEJORAS PARA SNAP */
/* ============================================================== */

.snap-none {
    scroll-snap-type: none !important;
}

.snap-x {
    scroll-snap-type: x mandatory !important;
}

.snap-y {
    scroll-snap-type: y mandatory !important;
}

.snap-both {
    scroll-snap-type: both mandatory !important;
}

.snap-start {
    scroll-snap-align: start !important;
}

.snap-center {
    scroll-snap-align: center !important;
}

.snap-end {
    scroll-snap-align: end !important;
}

/* ============================================================== */
/* MEJORAS PARA TOUCH */
/* ============================================================== */

.touch-auto {
    touch-action: auto !important;
}

.touch-none {
    touch-action: none !important;
}

.touch-pan-x {
    touch-action: pan-x !important;
}

.touch-pan-left {
    touch-action: pan-left !important;
}

.touch-pan-right {
    touch-action: pan-right !important;
}

.touch-pan-y {
    touch-action: pan-y !important;
}

.touch-pan-up {
    touch-action: pan-up !important;
}

.touch-pan-down {
    touch-action: pan-down !important;
}

.touch-pinch-zoom {
    touch-action: pinch-zoom !important;
}

.touch-manipulation {
    touch-action: manipulation !important;
}

/* ============================================================== */
/* MEJORAS PARA SELECT */
/* ============================================================== */

.select-none {
    -webkit-user-select: none !important;
    -moz-user-select: none !important;
    -ms-user-select: none !important;
    user-select: none !important;
}

.select-text {
    -webkit-user-select: text !important;
    -moz-user-select: text !important;
    -ms-user-select: text !important;
    user-select: text !important;
}

.select-all {
    -webkit-user-select: all !important;
    -moz-user-select: all !important;
    -ms-user-select: all !important;
    user-select: all !important;
}

.select-auto {
    -webkit-user-select: auto !important;
    -moz-user-select: auto !important;
    -ms-user-select: auto !important;
    user-select: auto !important;
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
                        <h3 class="text-themecolor mb-0 mt-0">
                            <i class="fa fa-list text-primary me-2"></i>
                            Cotizaciones
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home me-1"></i>Inicio</a></li>
								<li class="breadcrumb-item active" aria-current="page">
                                    <i class="fa fa-list me-1"></i>Cotizaciones
                                </li>
                            </ol>
                        </nav>
                    </div>
					
					<div class="col-md-6 col-4 align-self-center">
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" onclick="reporte();">
                                <i class="fa fa-print me-1"></i> Reporte
                            </button>
                            <a href="nueva_cotizacion.php" class="btn btn-success">
                                <i class="fa fa-plus-circle me-1"></i> Nueva cotización
                            </a>
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
						include("modal/enviar_email.php");
					}
				?>
				<?php 
					if ($permisos_ver==1){
				?>
				<div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    <i class="fa fa-search me-2"></i>
                                    Buscar Cotizaciones
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-4">
                                    <!-- Filtro de Fechas -->
                                    <div class="col-md-3 mb-3">
                                        <label for="daterange" class="form-label">
                                            <i class="fa fa-calendar me-1"></i>Rango de Fechas
                                        </label>
                                        <input type="text" name="daterange" id="daterange" 
                                               value="<?php echo "01/".date('m/Y')." - ".date("d/m/Y");?>" 
                                               class="form-control daterange" readonly />
                                    </div>
                                    
                                    <!-- Filtro de Vendedor -->
                                    <div class="col-md-2 mb-3">
                                        <label for="id_vendedor" class="form-label">
                                            <i class="fa fa-user me-1"></i>Vendedor
                                        </label>
                                        <select class="form-select" id="id_vendedor" onchange="load(1);">
                                            <option value="">Todos los vendedores</option>
                                            <?php
                                                $sql_user=mysqli_query($con,"select * from users");
                                                while ($rw_user=mysqli_fetch_array($sql_user)){
                                                    $vendedor=$rw_user['firstname']." ".$rw_user['lastname'];
                                                    $id_vendedor=$rw_user['user_id'];
                                                ?>
                                                <option value="<?php echo $id_vendedor;?>"><?php echo $vendedor;?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Filtro de Estado -->
                                    <div class="col-md-2 mb-3">
                                        <label for="status" class="form-label">
                                            <i class="fa fa-flag me-1"></i>Estado
                                        </label>
                                        <select class="form-select" id="status" onchange="load(1);">
                                            <option value="">Todos los estados</option>
                                            <option value="0">Pendiente</option>
                                            <option value="1">Aceptada</option>
                                            <option value="2">En Ejecución</option>
                                            <option value="3">Pagada</option>
                                            <option value="4">Nula</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Búsqueda por Texto -->
                                    <div class="col-md-4 mb-3">
                                        <label for="q" class="form-label">
                                            <i class="fa fa-search me-1"></i>Buscar
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="q" 
                                                   placeholder="Atención ó Empresa" onkeyup='load(1);'>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" onclick="load(1);">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Loader -->
                                    <div class="col-md-1 mb-3">
                                        <div class="d-flex align-items-end h-100">
                                            <span id="loader"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Resultados -->
                                <div class="row">
                                    <div id="resultados" class="col-12"></div>
                                    <div class="outer_div col-12"></div>
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
	<script src="assets/plugins/moment/moment.js"></script>
	<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="assets/js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="assets/js/cotizaciones.js"></script>
	
 </body>
</html>
