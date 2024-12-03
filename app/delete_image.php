<?php
$imagePath = $_GET['image'];
// extract the destination ID from the image path
$destinationId = pathinfo($imagePath, PATHINFO_FILENAME);
// extract the destination ID from the image path {destinationId}-00x.jpg
$id = substr($destinationId, 0, strpos($destinationId, '-'));

// Eliminar el archivo del servidor
if (file_exists($imagePath)) {
    unlink($imagePath);
}

header("Location: index.php?page=destination_form&id=$id&cache=false#images");
exit();
