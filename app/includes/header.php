<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mi Aplicación de Viajes' ?></title>
    <!-- Incluye Tailwind CSS desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-blue-600 text-white p-4 shadow-md">
    <nav class="container mx-auto flex justify-between items-center">
        <div>
            <a href="index.php" class="text-lg font-semibold">Sistema de Viajes</a>
        </div>
        <ul class="flex space-x-4">
            <li><a href="index.php" class="hover:underline">Inicio</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index.php?page=user_form" class="hover:underline">Gestión de Usuarios</a></li>
                <li><a href="index.php?page=destination_form" class="hover:underline">Gestión de Destinos</a></li>
                <li><a href="index.php?page=logout" class="hover:underline">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="index.php?page=login" class="hover:underline">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main class="container mx-auto mt-8 p-4 bg-white shadow-md rounded">
