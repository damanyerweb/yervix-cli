# 🛠️ Yervix Installer

![version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![license](https://img.shields.io/badge/license-MIT-green.svg)
![composer](https://img.shields.io/badge/composer-ready-orange.svg)

Instalador CLI para el framework **Yervix**, enfocado en simplicidad, seguridad, modularidad y experiencia del desarrollador. Permite crear proyectos nuevos, levantar un servidor local en segundos y prepararlos para su despliegue.

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
## OBSERVACIÓN PARA USERS Linux/macOS!!
```bash
composer global require yervix/installer
php ~/.composer/vendor/bin/yervix new nombre-del-proyecto   # Crea una nueva instalación de Yervix
cd mi-sitio
yervix serve    # Inicia servidor PHP local en puerto 8000
```

### Tu sitio estará disponible en
https://localhost:8000

## 📄 Licencia
Distribuido bajo la licencia MIT.

## ℹ️ Ayuda
Ejecuta yervix sin argumentos para ver los comandos disponibles.

## 👤 Autor
Desarrollado por Yerson Lora Guilarte, apasionado del desarrollo PHP moderno, enfocado en modularidad, automatización CLI y accesibilidad global.  