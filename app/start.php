<?php
// Inicia la sesión
session_start();

// Incluir la conexión a la base de datos
include 'conn.php';

// Verificar si la tabla 'users' está vacía
$query = "SELECT COUNT(*) AS user_count FROM users";
$result = $conn->query($query);
$row = $result->fetch_assoc();

// Si no hay usuarios, crea un usuario admin
if ($row['user_count'] == 0) {
    // Datos por defecto para el usuario admin
    $username = 'admin';
    $password = 'admin123';  // Cambia esta contraseña por una más segura

    // Encriptar la contraseña antes de guardarla
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insertar el usuario admin en la base de datos
    $insertQuery = "INSERT INTO users (username, password, email, role) VALUES (?, ?, 'admin@admin.com', 'admin')";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('ss', $username, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Usuario admin creado con éxito.";
    } else {
        echo "Error al crear el usuario admin: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Ya existen usuarios en la base de datos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
