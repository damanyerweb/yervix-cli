<?php
function yervix_install_project(string $projectName): void {
  // 🔒 Validar nombre
  if (empty($projectName)) {
    echo "⚠️ Debes ingresar un nombre válido.\n";
    exit(1);
  }
  if (is_dir($projectName)) {
    echo "⚠️ Ya existe una carpeta con ese nombre.\n";
    exit(1);
  }

  // 🎨 Selector de plantilla
  echo "\n🎨 Elige la plantilla visual para este proyecto:\n";
  echo "  [1] Bootstrap\n";
  echo "  [2] Bulma\n";
  echo "  [3] Flowbite (usa Tailwind)\n";
  $input = readline("👉 Escribe el número de opción y presiona ENTER: ");

  $selectedTemplate = match (trim($input)) {
    '1' => 'bootstrap',
    '2' => 'bulma',
    '3' => 'flowbite',
    default => 'flowbite'
  };

  // 📁 Crear estructura
  $folders = [
    "$projectName",
    "$projectName/core-engine",
    "$projectName/core-engine/builder",
    "$projectName/core-engine/modules",
    "$projectName/core-engine/templates/$selectedTemplate",
    "$projectName/core-engine/db",
    "$projectName/core-engine/deploy",
    "$projectName/controllers",
    "$projectName/models",
    "$projectName/views",
    "$projectName/public/assets",
  ];

  foreach ($folders as $folder) {
    mkdir($folder, 0755, true);
  }

  echo "📁 Carpetas creadas para '$projectName'.\n";

  // ⚙️ Archivo de configuración
  $config = <<<CONFIG
<?php
return [
  "template" => "$selectedTemplate",
  "database" => [
    "host" => "localhost",
    "name" => "yervix_db",
    "user" => "root",
    "pass" => ""
  ]
];
CONFIG;

  file_put_contents("$projectName/core-engine/config.php", $config);
  echo "🧠 Configuración generada.\n";

  // 🖼️ Vista inicial personalizada
  $headline = "Bienvenido a Yervix con " . ucfirst($selectedTemplate);
  $homeContent = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Yervix | $selectedTemplate</title>
  <!-- Estilos según plantilla -->
  %STYLES%
</head>
<body class="bg-light py-5 text-center">
  <h1 style="color:#007bff;">$headline</h1>
</body>
</html>
HTML;

  // 🔗 Inyectar estilos dinámicos
  $styles = match ($selectedTemplate) {
    'bootstrap' => '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">',
    'bulma' => '<link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">',
    default => '
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">'
  };
  $homeContent = str_replace('%STYLES%', $styles, $homeContent);

  file_put_contents("$projectName/core-engine/templates/$selectedTemplate/home.php", $homeContent);
  echo "🎨 Vista base generada en $selectedTemplate.\n";

  // 📄 index.php
  $indexContent = <<<PHP
<?php
\$config = require __DIR__ . '/core-engine/config.php';
\$template = \$config['template'] ?? 'flowbite';
\$viewPath = __DIR__ . "/core-engine/templates/\$template/home.php";

if (file_exists(\$viewPath)) {
  include \$viewPath;
} else {
  echo "<h1 style='color:red;'>Vista '\$template/home.php' no encontrada</h1>";
}
PHP;

  file_put_contents("$projectName/index.php", $indexContent);
  echo "📄 Archivo index.php listo.\n";

  // 🚀 Mensaje final estilo CLI moderno
  echo "\n✅ Proyecto '$projectName' creado exitosamente con plantilla '$selectedTemplate'.\n";
  echo "👉 Pasos siguientes:\n";
  echo "   cd $projectName\n";
  echo "   php yervix serve\n";
  echo "🌐 Accede en: http://localhost:8000\n\n";
}


