<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        if (isset($_GET['cache'])) {
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mi Aplicación de Viajes' ?></title>
    <!-- Incluye Tailwind CSS desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/styles/styles.css">
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-blue-600 text-white p-4 shadow-md">
    <nav class="container mx-auto flex justify-between items-center">
        <div class="color: white;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
            fill="currentColor" class="w-6 h-6 inline-flex">
            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
        </svg><?php echo $_SESSION['username'] ?? ''; ?>
            <a href="index.php" class="text-lg font-semibold">🌐 YerbaMate</a>
        </div>
        <ul class="flex space-x-4">
            <li><a href="index.php" class="hover:underline">Inicio</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index.php?page=user_form" class="hover:underline">Nuevo Usuario</a></li>
                <li><a href="index.php?page=destination_form" class="hover:underline">Nuevo Destino</a></li>
                <li><a href="index.php?page=logout" class="hover:underline">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="index.php?page=login" class="hover:underline">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main class="container mx-auto mt-8 p-4 bg-white shadow-md rounded">
