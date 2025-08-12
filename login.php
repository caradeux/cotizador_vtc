<?php
if (!file_exists ('config/db.php')){
		header("location: install/paso1.php");
		exit;
	}
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");
// load the login class
require_once("classes/Login.php");
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
   header("location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Cotizaciones VTC - Acceso Corporativo">
    <meta name="author" content="VTC">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Acceso al Sistema - VTC Cotizaciones</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Corporate Theme -->
    <link href="assets/css/colors/corporate.css" id="theme" rel="stylesheet">
    <!-- Corporate improvements CSS -->
    <link href="assets/css/corporate-improvements.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link href="assets/scss/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="login-page">
    <style>
        /* ============================================================== */
        /* LOGIN CORPORATIVO MODERNO - VTC COTIZACIONES */
        /* ============================================================== */
        
        :root {
            --primary-color: #1e3a8a;
            --primary-light: #3b82f6;
            --primary-dark: #1e40af;
            --secondary-color: #64748b;
            --success-color: #059669;
            --danger-color: #dc2626;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body.login-page {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        /* Fondo animado con formas geométricas */
        body.login-page::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }
        
        body.login-page::after {
            content: '';
            position: absolute;
            top: 10%;
            right: 10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.1); opacity: 0.6; }
        }
        
        /* Container principal del login */
        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .login-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            background: var(--white);
            border-radius: 24px;
            box-shadow: var(--shadow-2xl);
            overflow: hidden;
            min-height: 600px;
        }
        
        /* Panel izquierdo - Información corporativa */
        .login-info-panel {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }
        
        .login-info-panel::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .login-info-panel::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
        }
        
        .company-logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }
        
        .company-logo i {
            font-size: 2.5rem;
            color: var(--white);
        }
        
        .company-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        
        .company-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }
        
        .features-list {
            list-style: none;
            text-align: left;
            position: relative;
            z-index: 2;
        }
        
        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            opacity: 0.9;
        }
        
        .features-list li i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
        }
        
        /* Panel derecho - Formulario de login */
        .login-form-panel {
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .login-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: var(--gray-600);
            font-size: 0.95rem;
        }
        
        /* Alertas mejoradas */
        .alert-modern {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        
        .alert-modern i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }
        
        .alert-danger-modern {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.1) 0%, rgba(239, 68, 68, 0.1) 100%);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }
        
        .alert-success-modern {
            background: linear-gradient(135deg, rgba(5, 150, 105, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }
        
        /* Formulario moderno */
        .form-group-modern {
            margin-bottom: 1.5rem;
        }
        
        .form-label-modern {
            display: block;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }
        
        .form-control-modern {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: var(--white);
            color: var(--gray-800);
        }
        
        .form-control-modern:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
            background: var(--white);
        }
        
        .form-control-modern::placeholder {
            color: var(--gray-400);
        }
        
        /* Input con icono */
        .input-group-modern {
            position: relative;
        }
        
        .input-group-modern i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1.1rem;
            z-index: 2;
        }
        
        .input-group-modern .form-control-modern {
            padding-left: 3rem;
        }
        
        /* Botón de login moderno */
        .btn-login-modern {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            border: none;
            border-radius: 12px;
            color: var(--white);
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(30, 58, 138, 0.3);
            margin-bottom: 1.5rem;
        }
        
        .btn-login-modern:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px -3px rgba(30, 58, 138, 0.4);
        }
        
        .btn-login-modern:active {
            transform: translateY(0);
        }
        
        /* Enlaces */
        .forgot-password {
            text-align: center;
            margin-top: 1rem;
        }
        
        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }
        
        /* Footer del login */
        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }
        
        .login-footer p {
            color: var(--gray-500);
            font-size: 0.8rem;
            margin: 0;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                padding: 1rem;
            }
            
            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 0 auto;
            }
            
            .login-info-panel {
                display: none;
            }
            
            .login-form-panel {
                padding: 2rem 1.5rem;
            }
            
            .company-title {
                font-size: 1.5rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
        
        /* Animaciones de entrada */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
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
    </style>

    <div class="login-container">
        <div class="login-wrapper fade-in-up">
            <!-- Panel Izquierdo - Información Corporativa -->
            <div class="login-info-panel">
                <div class="company-logo">
                    <i class="mdi mdi-chart-line"></i>
                </div>
                <h1 class="company-title">VTC Cotizaciones</h1>
                <p class="company-subtitle">
                    Sistema integral de gestión comercial diseñado para optimizar tus procesos de cotización y ventas.
                </p>
                <ul class="features-list">
                    <li>
                        <i class="mdi mdi-check-circle"></i>
                        Gestión completa de cotizaciones
                    </li>
                    <li>
                        <i class="mdi mdi-check-circle"></i>
                        Control de inventario y productos
                    </li>
                    <li>
                        <i class="mdi mdi-check-circle"></i>
                        Reportes y análisis avanzados
                    </li>
                    <li>
                        <i class="mdi mdi-check-circle"></i>
                        Interfaz moderna y profesional
                    </li>
                </ul>
            </div>
            
            <!-- Panel Derecho - Formulario de Login -->
            <div class="login-form-panel">
                <div class="login-header">
                    <h2 class="login-title">Inicio de Sesión</h2>
                    <p class="login-subtitle">Accede a tu cuenta para continuar</p>
                </div>
                
                <?php
                // Mostrar errores y mensajes con diseño moderno
                if (isset($login)) {
                    if ($login->errors) {
                        ?>
                        <div class="alert-modern alert-danger-modern">
                            <i class="mdi mdi-alert-circle"></i>
                            <div>
                                <strong>Error de acceso</strong><br>
                                <?php 
                                foreach ($login->errors as $error) {
                                    echo $error;
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if ($login->messages) {
                        ?>
                        <div class="alert-modern alert-success-modern">
                            <i class="mdi mdi-check-circle"></i>
                            <div>
                                <strong>Información</strong><br>
                                <?php
                                foreach ($login->messages as $message) {
                                    echo $message;
                                }
                                ?>
                            </div>
                        </div> 
                        <?php 
                    }
                }
                ?>
                
                <form id="loginform" action="login.php" method="post">
                    <div class="form-group-modern">
                        <label class="form-label-modern" for="user_name">Usuario</label>
                        <div class="input-group-modern">
                            <i class="mdi mdi-account"></i>
                            <input class="form-control-modern" type="text" id="user_name" name="user_name" 
                                   placeholder="Ingresa tu usuario" required autocomplete="username">
                        </div>
                    </div>
                    
                    <div class="form-group-modern">
                        <label class="form-label-modern" for="user_password">Contraseña</label>
                        <div class="input-group-modern">
                            <i class="mdi mdi-lock"></i>
                            <input class="form-control-modern" type="password" id="user_password" name="user_password" 
                                   placeholder="Ingresa tu contraseña" required autocomplete="current-password">
                        </div>
                    </div>
                    
                    <button class="btn-login-modern" type="submit" name="login">
                        <i class="mdi mdi-login me-2"></i>
                        Ingresar al Sistema
                    </button>
                </form>
                
                <div class="forgot-password">
                    <a href="recovery.php">
                        <i class="mdi mdi-lock-reset me-1"></i>
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                
                <div class="login-footer">
                    <p>&copy; 2025 VTC Cotizaciones. Sistema de gestión comercial profesional.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Scripts Modernos -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        // Efectos modernos para el login
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de entrada para los elementos del formulario
            const formElements = document.querySelectorAll('.form-group-modern');
            formElements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100 + 300);
            });
            
            // Efecto de focus en los inputs
            const inputs = document.querySelectorAll('.form-control-modern');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
            
            // Efecto de loading en el botón de submit
            const loginForm = document.getElementById('loginform');
            const loginButton = document.querySelector('.btn-login-modern');
            
            loginForm.addEventListener('submit', function(e) {
                // No prevenir el envío del formulario
                loginButton.innerHTML = '<i class="mdi mdi-loading mdi-spin me-2"></i>Iniciando sesión...';
                loginButton.disabled = true;
                // Permitir que el formulario se envíe normalmente
            });
            
            // Validación en tiempo real
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = 'var(--success-color)';
                        this.style.boxShadow = '0 0 0 3px rgba(5, 150, 105, 0.1)';
                    } else {
                        this.style.borderColor = 'var(--gray-200)';
                        this.style.boxShadow = 'none';
                    }
                });
            });
        });
        
        // Efecto de partículas en el fondo (opcional)
        function createParticle() {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = '4px';
            particle.style.height = '4px';
            particle.style.background = 'rgba(255, 255, 255, 0.3)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = '100%';
            particle.style.animation = 'floatUp 8s linear infinite';
            
            document.body.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 8000);
        }
        
        // Crear partículas cada 2 segundos
        setInterval(createParticle, 2000);
        
        // Agregar animación CSS para las partículas
        const style = document.createElement('style');
        style.textContent = `
            @keyframes floatUp {
                to {
                    transform: translateY(-100vh) rotate(360deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>

</body>
</html>