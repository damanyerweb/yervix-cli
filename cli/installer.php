<?php

function yervix_install_project(string $projectName): void
{
  // 🔍 Validar nombre
  if (empty($projectName)) {
    echo "⚠️ Debes ingresar un nombre válido.\n";
    exit;
  }
  if (is_dir($projectName)) {
    echo "⚠️ Ya existe una carpeta con ese nombre.\n";
    exit;
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
    "$projectName/core-engine/templates",
    "$projectName/core-engine/templates/bootstrap",
    "$projectName/core-engine/templates/bulma",
    "$projectName/core-engine/templates/flowbite",
    "$projectName/core-engine/db",
    "$projectName/core-engine/deploy",
    "$projectName/controllers",
    "$projectName/models",
    "$projectName/views",
    "$projectName/public",
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

  // 🖼️ Vista inicial
  $homeContent = match ($selectedTemplate) {
    'bootstrap' => <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Yervix | Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-primary">Bienvenido a Yervix con Bootstrap</h1>
  </div>
</body>
</html>
HTML,

    'bulma' => <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Yervix | Bulma</title>
  <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
</head>
<body>
  <section class="section">
    <div class="container">
      <h1 class="title has-text-primary">Bienvenido a Yervix con Bulma</h1>
    </div>
  </section>
</body>
</html>
HTML,

    default => <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Yervix | Flowbite</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 py-10">
  <div class="text-center">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">Bienvenido a Yervix con Flowbite</h1>
  </div>
</body>
</html>
HTML
  };

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

  echo "\n✅ Proyecto '$projectName' creado exitosamente con plantilla '$selectedTemplate'.\n";
  echo "👉 Entra al proyecto:\n   cd $projectName\n";
  echo "🚀 Levántalo:\n   php yervix serve\n";
  echo "🌐 Accede en: http://localhost:8000\n\n";
}

