<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit;
}
?>

<div class="text-center">
    <h1 class="text-3xl font-bold mb-4">Bienvenido a la Página Principal</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <a href="index.php?page=users_table" class="block p-6 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
        <h2 class="text-xl font-semibold">Usuarios</h2>
        <p>Gestionar usuarios del sistema.</p>
    </a>
    <a href="index.php?page=destinations_table" class="block p-6 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600">
        <h2 class="text-xl font-semibold">Destinos</h2>
        <p>Gestionar destinos de viaje.</p>
    </a>
</div>
