<?php
session_start();
include 'includes/header.php';

$page = isset($_GET['page']) ? basename($_GET['page']) : 'home';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_id']) && $page !== 'login') {
    $page = 'login';
}

// Define las páginas permitidas
$allowed_pages = [
    'home', 'login',
    'user_form', 'destination_form',
    'users_table', 'destinations_table',
    'logout'];

// Carga la página solicitada si está permitida
if (in_array($page, $allowed_pages)) {
    include "pages/{$page}.php";
} else {
    echo "<p>Página no encontrada.</p>";
}

// Incluye el pie de página
include 'includes/footer.php';
?>
