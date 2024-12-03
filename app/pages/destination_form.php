<?php
// Conectar a la base de datos
include "conn.php";

// Inicializar variables
$destination = $description = $departure = $arrival = $price = $promo_price = $tags = "";
$is_edit = isset($_GET['id']);
if ($is_edit) {
    $id = intval($_GET['id']);
    // Obtener datos del destino existente
    $stmt = $conn->prepare("SELECT destination, description, departure, arrival, price, promo_price, tags FROM destinations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($destination, $description, $departure, $arrival, $price, $promo_price, $tags);
    $stmt->fetch();
    $stmt->close();
}
?>

<form id="destination-form" action="save_destination.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $is_edit ? $id : '' ?>">

    <!-- Campo de Destino -->
    <div class="mb-6">
        <label for="destination" class="block text-gray-800 text-sm font-semibold mb-2">Destino:</label>
        <input type="text" id="destination" name="destination" value="<?= htmlspecialchars($destination) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Campo de Descripción -->
    <div class="mb-6">
        <label  class="block text-gray-800 text-sm font-semibold mb-2">Descripción:</label>
        <input type="hidden" id="description" name="description" value="<?= htmlspecialchars($description) ?>">
        <!-- Create the editor container -->
        <div id="editor"><?= $description ?>     
        </div>
    </div>

    <!-- Campo de Fecha de Salida -->
    <div class="mb-6">
        <label for="departure" class="block text-gray-800 text-sm font-semibold mb-2">Fecha de Salida:</label>
        <input type="datetime-local" id="departure" name="departure" value="<?= htmlspecialchars($departure) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Campo de Fecha de Llegada -->
    <div class="mb-6">
        <label for="arrival" class="block text-gray-800 text-sm font-semibold mb-2">Fecha de Llegada:</label>
        <input type="datetime-local" id="arrival" name="arrival" value="<?= htmlspecialchars($arrival) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Campo de Precio -->
    <div class="mb-6">
        <label for="price" class="block text-gray-800 text-sm font-semibold mb-2">Precio:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= htmlspecialchars($price) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Campo de Precio con Promoción -->
    <div class="mb-6">
        <label for="promo_price" class="block text-gray-800 text-sm font-semibold mb-2">Precio Promocional:</label>
        <input type="number" step="0.01" id="promo_price" name="promo_price" value="<?= htmlspecialchars($promo_price) ?>" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Campo de Etiquetas -->
    <div class="mb-6">
        <label for="tags" class="block text-gray-800 text-sm font-semibold mb-2">Etiquetas (separadas por coma):</label>
        <input type="text" id="tags" name="tags" value="<?= htmlspecialchars($tags) ?>" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Campo de Imágenes -->
    <div class="mb-6">
        <label for="images" class="block text-gray-800 text-sm font-semibold mb-2">Imágenes del Destino:</label>
        <input type="file" id="images" name="images[]" accept="image/jpg, image/jpeg, image/png, image/webp" multiple class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Mostrar imagenes del destino -->
    <?php
    // Verificar si estamos editando un destino existente
    if ($is_edit && !empty($id)) {
        $imageDir = "../uploads/destinations";
        $imagePattern = sprintf('%d-*.jpg', $id); // Formato {id}-00n.jpg
        $images = glob("$imageDir/$imagePattern"); // Buscar imágenes que coincidan con el patrón
        $featuredImage = sprintf('%s/%d-featured.jpg', $imageDir, $id);

        if ($images) {
            echo '<div class="mb-2 block text-gray-700 text-sm font-bold">
                Imágenes del Destino:
                </div>';
            echo '<div class="flex flex-wrap gap-4 mb-2">';

            foreach ($images as $image) {
                $imagePath = str_replace(__DIR__, '', $image); // Para la ruta relativa
                echo '<div class="w-24 h-24 overflow-hidden relative rounded">';
                echo "<img src=\"$imagePath\" alt=\"Imagen del destino\" class=\"w-full h-full object-cover\">";
                echo '<div class="absolute bottom-0 right-0 p-1 flex w-full justify-between">';
                if($image == $featuredImage) {
                    echo '🌟🌟🌟';
                }else {
                    echo "<a href='feature_image.php?image=$image' class='text-blue-500' target='_self' title='Destacar'>🌟</a>";
                    echo "<a href='delete_image.php?image=$image' target='_self' title='Eliminar'
                        onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta imagen?\")' >🗑️</a>";
                }
                echo '</div></div>';
            }

            echo '</div>';
            echo '</div>';
        } else {
            echo '<p class="text-gray-500">No hay imágenes cargadas para este destino.</p>';
        }
    }
    ?>

    <!-- Botón de Enviar -->
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?= $is_edit ? 'Actualizar Destino' : 'Guardar Destino' ?>
        </button>
    </div>
</form>
<!-- Include Quill stylesheet -->
<link
  href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css"
  rel="stylesheet"
/>

<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  const quill = new Quill("#editor", {
    theme: "snow",
  });
  // on Form Submit
  const form = document.getElementById("destination-form");
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const description = quill.root.innerHTML;
    document.getElementById("description").value = description;
    form.submit();
  });
</script>