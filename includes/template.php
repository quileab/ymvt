<?php
// Incluir encabezado
$title = $title ?? 'Mi Aplicación';
include 'includes/header.php';
?>

<?= $content ?? '' ?>

<?php
// Incluir pie de página
include 'includes/footer.php';
?>
