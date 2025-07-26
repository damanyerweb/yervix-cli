# 🛠️ Yervix Installer

![version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![license](https://img.shields.io/badge/license-MIT-green.svg)
![composer](https://img.shields.io/badge/composer-ready-orange.svg)

Instalador CLI para el framework Yervix, enfocado en simplicidad, seguridad, modularidad y experiencia del desarrollador. Permite crear proyectos nuevos, levantar un servidor local en segundos y prepararlos para su despliegue.

## 🧰 Requisitos previos

Asegúrate de tener instalados:

- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) >= 7.4+
- Gestor de base de datos (opcional según tu stack)

## 🚀 Instalación global

Instala el comando `yervix` globalmente usando Composer:

```bash
composer global require yervix/installer
yervix new nombre-del-proyecto   # Crea una nueva instalación de Yervix
cd mi-sitio
yervix serve    # Inicia servidor PHP local en puerto 8000
```

### Tu sitio estará disponible en: ➡️ http://localhost:8000

## 🧩 Solución a problemas comunes
⚠️ El comando yervix no se reconoce en Windows
Si después de instalar ves este mensaje:
```
⚠️ El comando `yervix` no está en tu PATH.
```
Significa que el ejecutable está instalado pero tu sistema aún no sabe dónde buscarlo. Para solucionarlo:
## 🛠 Cómo agregar Yervix al PATH global en Windows
1. Abre el menú Inicio y busca "Editar las variables de entorno del sistema"

2. Haz clic en “Variables de entorno…”

3. En “Variables del sistema”, selecciona Path y presiona “Editar…”

4. Haz clic en “Nuevo” y agrega:
```
C:\Users\<TU-USUARIO>\AppData\Roaming\Composer\vendor\bin
```
> [!NOTE]
> Useful information that users should know, even when skimming content.

5. Guarda los cambios y reinicia tu terminal.
Una vez hecho esto, podrás usar el comando yervix desde cualquier carpeta 🎉
## 📄 Licencia
Distribuido bajo la licencia MIT.

## ℹ️ Ayuda
Ejecuta yervix sin argumentos para ver los comandos disponibles.

## 👤 Autor
Desarrollado por Yerson Lora Guilarte, apasionado del desarrollo PHP moderno, enfocado en modularidad, automatización CLI y accesibilidad global.  