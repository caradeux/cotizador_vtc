# Instrucciones para habilitar extensiones GD o Imagick en XAMPP

## Problema
El sistema requiere la extensión GD o Imagick para generar PDFs con imágenes. Estas extensiones no están habilitadas por defecto en XAMPP.

## Solución 1: Habilitar extensión GD (Recomendado)

### Paso 1: Abrir php.ini
1. Ve a la carpeta de XAMPP: `C:\xampp\php\`
2. Abre el archivo `php.ini` con un editor de texto (Notepad++, Visual Studio Code, etc.)

### Paso 2: Buscar y descomentar la línea GD
1. Busca la línea: `;extension=gd`
2. Quita el punto y coma del inicio para que quede: `extension=gd`
3. Guarda el archivo

### Paso 3: Reiniciar Apache
1. Abre el Panel de Control de XAMPP
2. Detén Apache si está corriendo
3. Inicia Apache nuevamente

## Solución 2: Habilitar extensión Imagick (Alternativa)

### Paso 1: Descargar Imagick
1. Ve a: https://pecl.php.net/package/imagick
2. Descarga la versión compatible con tu PHP
3. Extrae el archivo `php_imagick.dll` a `C:\xampp\php\ext\`

### Paso 2: Configurar php.ini
1. Abre `C:\xampp\php\php.ini`
2. Busca la línea: `;extension=imagick`
3. Quita el punto y coma: `extension=imagick`
4. Guarda el archivo

### Paso 3: Reiniciar Apache
1. Detén y reinicia Apache desde el Panel de Control de XAMPP

## Verificar que funciona

### Opción 1: Crear archivo de prueba
Crea un archivo `test_extensions.php` en tu carpeta web:

```php
<?php
echo "<h2>Extensiones disponibles:</h2>";
echo "<ul>";
echo "<li>GD: " . (extension_loaded('gd') ? '✅ Habilitada' : '❌ No habilitada') . "</li>";
echo "<li>Imagick: " . (extension_loaded('imagick') ? '✅ Habilitada' : '❌ No habilitada') . "</li>";
echo "</ul>";

if (extension_loaded('gd')) {
    echo "<p>✅ GD está habilitada. Los PDFs deberían funcionar correctamente.</p>";
} elseif (extension_loaded('imagick')) {
    echo "<p>✅ Imagick está habilitada. Los PDFs deberían funcionar correctamente.</p>";
} else {
    echo "<p>❌ Ninguna extensión está habilitada. Los PDFs pueden fallar.</p>";
}
?>
```

### Opción 2: Verificar desde línea de comandos
1. Abre Command Prompt
2. Ve a la carpeta de XAMPP: `cd C:\xampp\php`
3. Ejecuta: `php -m | findstr -i gd`
4. Ejecuta: `php -m | findstr -i imagick`

## Solución temporal (si no puedes habilitar las extensiones)

Si no puedes habilitar las extensiones inmediatamente, el sistema ahora maneja mejor los errores y debería funcionar sin imágenes o con imágenes básicas.

## Notas importantes

- **Reinicio obligatorio**: Siempre reinicia Apache después de modificar php.ini
- **Versiones compatibles**: Asegúrate de descargar la versión correcta de Imagick para tu versión de PHP
- **Permisos**: Asegúrate de que el usuario de Apache tenga permisos para leer las extensiones
- **Backup**: Haz una copia de seguridad de php.ini antes de modificarlo

## Contacto

Si tienes problemas, verifica:
1. Que el archivo php.ini se guardó correctamente
2. Que Apache se reinició completamente
3. Que no hay errores en los logs de Apache (`C:\xampp\apache\logs\error.log`)
