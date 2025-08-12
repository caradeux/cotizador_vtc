# Sistema de Cotizaciones VTC

Sistema web completo para gestión de cotizaciones, productos, clientes y facturación desarrollado en PHP y MySQL.

## 🚀 Características

- **Gestión de Cotizaciones**: Creación, edición y seguimiento de cotizaciones
- **Catálogo de Productos**: Gestión completa de productos con códigos, precios y fabricantes
- **Gestión de Clientes**: Base de datos de clientes y contactos
- **Sistema de Usuarios**: Control de acceso con roles y permisos granulares
- **Multi-moneda**: Soporte para múltiples monedas con formateo personalizado
- **Generación de PDFs**: Múltiples plantillas profesionales para cotizaciones
- **Dashboard**: Panel de control con estadísticas en tiempo real
- **Interfaz Moderna**: Diseño responsive con Bootstrap 4

## 🛠️ Tecnologías

- **Backend**: PHP 5.3+
- **Base de Datos**: MySQL
- **Frontend**: Bootstrap 4, jQuery, AJAX
- **PDFs**: HTML2PDF/TCPDF
- **Iconos**: Font Awesome
- **Notificaciones**: SweetAlert

## 📋 Requisitos

- PHP 5.3 o superior
- MySQL 5.0 o superior
- Extensión GD o Imagick (para PDFs con imágenes)
- Apache/Nginx con mod_rewrite

## 🔧 Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/caradeux/cotizador_vtc.git
   ```

2. **Configurar la base de datos**
   - Crear una base de datos MySQL
   - Importar el archivo SQL de instalación
   - Configurar las credenciales en `config/db.php`

3. **Configurar permisos**
   - Asegurar permisos de escritura en directorios necesarios
   - Configurar virtual host si es necesario

4. **Habilitar extensiones PHP**
   - Habilitar extensión GD o Imagick para PDFs
   - Ver documentación en `INSTRUCCIONES_GD_IMAGICK.md`

## 📖 Documentación

- `README_PDF_FIX.md` - Solución para problemas de generación de PDF
- `SOLUCION_PDF_PASO_A_PASO.md` - Guía paso a paso para configurar PDFs
- `INSTRUCCIONES_GD_IMAGICK.md` - Instrucciones para habilitar extensiones

## 🏗️ Estructura del Proyecto

```
├── ajax/                   # Operaciones AJAX
├── assets/                 # CSS, JS, imágenes
├── classes/                # Clases PHP
├── config/                 # Configuración
├── install/                # Instalador
├── modal/                  # Modales de interfaz
├── view/                   # Vistas y templates
│   └── pdf/               # Plantillas PDF
├── funciones.php          # Funciones principales
├── index.php              # Página principal
└── login.php              # Sistema de login
```

## 🔐 Usuarios por Defecto

- **Usuario**: admin
- **Contraseña**: Augusto4003.

## 🤝 Contribuir

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo `LICENSE` para más detalles.

## 👨‍💻 Autor

Desarrollado por el equipo VTC

## 🐛 Reportar Problemas

Si encuentras algún problema, por favor abre un issue en GitHub con:
- Descripción detallada del problema
- Pasos para reproducir
- Versión de PHP y MySQL
- Logs de error si están disponibles

## 📞 Soporte

Para soporte técnico, consulta la documentación incluida o abre un issue en GitHub.