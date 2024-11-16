<?php
session_start();
include 'includes/header.php';
include 'includes/nav.php';

// show message session
if (isset($_SESSION['message'])) {
    echo "🚧 ".$_SESSION['message'];
    unset($_SESSION['message']);
}

$page = isset($_GET['page']) ? basename($_GET['page']) : 'home';

// Define las páginas permitidas
$allowed_pages = ['destination','contacts','legal','home'];

// Carga la página solicitada si está permitida
if (in_array($page, $allowed_pages)) {
  echo"<main style='margin-top: 5.5rem;'>";
    include "pages/{$page}.php";
  echo"</main>";
} else {
    echo "<p>Página no encontrada.</p>";
}

include 'includes/dialog.php';
// Incluye el pie de página
include 'includes/footer.php';
