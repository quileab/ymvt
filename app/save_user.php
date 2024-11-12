<?php
session_start();

// Conectar a la base de datos
include "/app/conn.php";

// Obtener y sanitizar datos
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$username = //filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  preg_replace('/[^a-zA-Z0-9]/', '', $_POST['username']);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? null;

$message = "Usuario guardado.";

// Verificar si es modificación o alta
if ($id) {
    // Actualizar usuario existente
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $email, $id);
    $stmt->execute();
} else {
    // Insertar nuevo usuario
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    $stmt->execute();
}

$stmt->close();
$conn->close();
$_SESSION['message'] = $message;
header("Location: /app/index.php?page=users_table");
