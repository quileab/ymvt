<?php
// Conectar a la base de datos
include "conn.php";

// Inicializar variables
$username = $email = $role = "";
$is_edit = isset($_GET['id']);
if ($is_edit) {
    $id = intval($_GET['id']);
    // Obtener datos del usuario existente
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username, $email);
    $stmt->fetch();
    $stmt->close();
}
?>

<form action="save_user.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $is_edit ? $id : '' ?>">

    <!-- Nombre de Usuario -->
    <div class="mb-6">
        <label for="username" class="block text-gray-800 text-sm font-semibold mb-2">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Correo Electrónico -->
    <div class="mb-6">
        <label for="email" class="block text-gray-800 text-sm font-semibold mb-2">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Contraseña -->
    <div class="mb-6">
        <label for="password" class="block text-gray-800 text-sm font-semibold mb-2">Contraseña:</label>
        <input type="password" id="password" name="password" value="<?= htmlspecialchars($password) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Confirmar Contraseña -->
    <div class="mb-6">
        <label for="confirm_password" class="block text-gray-800 text-sm font-semibold mb-2">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" value="<?= htmlspecialchars($confirm_password) ?>" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Rol de Usuario -->
    <div class="mb-6">
        <label for="role" class="block text-gray-800 text-sm font-semibold mb-2">Rol:</label>
        <select id="role" name="role" required class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="customer" <?= $role == 'customer' ? 'selected' : '' ?>>Cliente</option>
            <option value="admin" <?= $role == 'admin' ? 'selected' : '' ?>>Administrador</option>
        </select>
    </div>

    <!-- Botón de Enviar -->
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <?= $is_edit ? 'Actualizar Usuario' : 'Crear Usuario' ?>
        </button>
    </div>
</form>