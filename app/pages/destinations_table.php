<?php
// Conexión a la base de datos
require_once 'conn.php';

// Consulta para obtener todos los destinos
$query = "SELECT id, destination, departure, arrival, price, promo_price FROM destinations";
$result = $conn->query($query);
?>

<h2 class="text-2xl font-bold mb-4">Lista de Viajes</h2>

<table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
    <thead>
        <tr>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">ID</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Destino</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Salida</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Llegada</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Precio</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td class="py-3 px-4 border-b border-gray-200"><?= $row['id'] ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= htmlspecialchars($row['destination']) ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= date('d-m-Y H:i', strtotime($row['departure'])) ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= date('d-m-Y H:i', strtotime($row['arrival'])) ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= number_format($row['price'], 2) ?> USD</td>
                <td class="py-3 px-4 border-b border-gray-200">
                    <a href="index.php?page=destination_form&id=<?= $row['id'] ?>&cache=false" class="text-blue-500 hover:underline">Editar</a> |
                    <a href="delete_destination.php?id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar este destino?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
