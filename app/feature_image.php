<?php
$imagePath = $_GET['image'];
// extract the destination ID from the image path
$destinationId = pathinfo($imagePath, PATHINFO_FILENAME);
// extract the destination ID from the image path {destinationId}-00x.jpg
$id = substr($destinationId, 0, strpos($destinationId, '-'));

// Definir la ruta de destino para la imagen destacada
$featuredImagePath = "../uploads/destinations/{$id}-featured.jpg";
// Copiar la imagen seleccionada a la ruta destacada
if (file_exists($imagePath)) {
    copy($imagePath, $featuredImagePath);
}

header("Location: index.php?page=destination_form&id=$id#images");
exit();
