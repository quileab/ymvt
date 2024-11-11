<?php
// Conectar a la base de datos
include "conn.php";

// Obtener y sanitizar datos
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$destination = //filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING);
  preg_replace('/[^a-zA-Z0-9 ,.-]/', '', strip_tags($_POST['destination']));
$description = //filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  //strip_tags(
    $_POST['description'];
$departure = //timestamp  filter_input(INPUT_POST, 'departure', FILTER_SANITIZE_);
  preg_replace('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', '', $_POST['departure']);
$arrival = //filter_input(INPUT_POST, 'arrival', FILTER_SANITIZE_STRING);
  preg_replace('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/', '', $_POST['arrival']);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$promo_price = filter_input(INPUT_POST, 'promo_price', FILTER_VALIDATE_FLOAT);
$tags = //filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
  preg_replace('/[^a-zA-Z0-9,]/', '', $_POST['tags']);
// Carpeta donde se guardarán las imágenes
$uploadDir = __DIR__.'/../uploads/destinations';

// Si no existe la carpeta, crearla
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
// Verificar si se subieron imágenes
if (!empty($_FILES['images']['name'][0])) {
  $imageCount = 1; // Contador de imágenes para el formato 001, 002, etc.
  
  foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
      if ($_FILES['images']['error'][$index] == UPLOAD_ERR_OK) {
          // Formatear el nombre del archivo
          $filename = sprintf('%d-%03d.jpg', $id, $imageCount);
          $destinationPath = "$uploadDir/$filename";

          // Mover el archivo a la carpeta de destino
          if (move_uploaded_file($tmpName, $destinationPath)) {
              $imageCount++;
          } else {
              echo "Error al guardar la imagen $filename.";
          }
      }
  }
}

// Verificar si es modificación o alta
if ($id) {
    // Actualizar destino existente
    $stmt = $conn->prepare("UPDATE destinations SET destination = ?, description = ?, departure = ?, arrival = ?, price = ?, promo_price = ?, tags = ? WHERE id = ?");
    $stmt->bind_param("ssssddsi", $destination, $description, $departure, $arrival, $price, $promo_price, $tags, $id);
    $stmt->execute();
    echo "Destino actualizado con éxito.";
} else {
    // Insertar nuevo destino
    $stmt = $conn->prepare("INSERT INTO destinations (destination, description, departure, arrival, price, promo_price, tags) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdds", $destination, $description, $departure, $arrival, $price, $promo_price, $tags);
    $stmt->execute();
    echo "Destino guardado con éxito.";
}

$stmt->close();
$conn->close();
?>
