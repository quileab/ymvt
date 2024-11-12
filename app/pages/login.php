<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = preg_replace('/[^a-zA-Z0-9ÑñÁáÉéÍíÓóÚúÜü_-]/', '', strip_tags($_POST['username']));
    $password = $_POST['password'];
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param('s', $username);
    $query->execute();
    $result = $query->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: ./index.php?page=home');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<div class="max-w-md mx-auto">
    <h2 class="text-2xl font-semibold text-center mb-4">Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <p class="text-red-500 mb-4 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="index.php?page=login" class="space-y-4">
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Usuario</label>
            <input type="text" id="username" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">Iniciar Sesión</button>
        </div>
    </form>
</div>
