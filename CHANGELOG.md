## [v1.1.1] - 2025-07-25

### 🚀 Nuevo flujo integrado en binario
- Se elimina `installer.php` y la carpeta `cli`
- El binario `yervix` incluye:
  - Comando `new`: Crea proyecto Yervix con estructura completa, plantilla visual, configuración y vista inicial
  - Comando `serve`: Inicia servidor local y abre navegador automáticamente (Windows/macOS/Linux)

### 🎨 Plantillas soportadas
- Tailwind (por defecto)
- Bootstrap
- Bulma
- Flowbite

### ✅ Mejoras
- Flujo más directo, sin modularizaciones innecesarias
- Apertura automática del navegador respetando sistema operativo
- Validación de PATH en sistemas que lo requieran
