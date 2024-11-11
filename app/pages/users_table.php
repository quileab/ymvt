<?php
// Conexión a la base de datos
require_once 'conn.php';

// Consulta para obtener todos los usuarios
$query = "SELECT id, username, email, role FROM users";
$result = $conn->query($query);
?>

<h2 class="text-2xl font-bold mb-4">Lista de Usuarios</h2>

<table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
    <thead>
        <tr>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">ID</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Nombre de Usuario</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Correo Electrónico</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Rol</th>
            <th class="py-3 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td class="py-3 px-4 border-b border-gray-200"><?= $row['id'] ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= htmlspecialchars($row['username']) ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= htmlspecialchars($row['email']) ?></td>
                <td class="py-3 px-4 border-b border-gray-200"><?= htmlspecialchars($row['role']) ?></td>
                <td class="py-3 px-4 border-b border-gray-200">
                    <a href="index.php?page=user_form&id=<?= $row['id'] ?>" class="text-blue-500 hover:underline">Editar</a> |
                    <a href="delete_user.php?id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
