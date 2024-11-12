<?php
require_once 'conn.php';

// Crear la tabla `users` si no existe
$createUsersTable = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role varchar(10) NOT NULL DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

if ($conn->query($createUsersTable) === TRUE) {
    echo "Tabla `users` verificada.<br>";
} else {
    echo "Error creando la tabla `users`: " . $conn->error . "<br>";
}

// Crear la tabla `destinations` si no existe
$createDestinationsTable = "
CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination TEXT NOT NULL,
    description LONGTEXT,
    departure TIMESTAMP,
    arrival TIMESTAMP,
    price DECIMAL(12,2) NOT NULL,
    promo_price DECIMAL(12,2) DEFAULT NULL,
    tags TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
";

if ($conn->query($createDestinationsTable) === TRUE) {
    echo "Tabla `destinations` verificada.<br>";
} else {
    echo "Error creando la tabla `destinations`: " . $conn->error . "<br>";
}

// Verificar si existe un usuario "admin"
$checkAdminQuery = "SELECT id FROM users WHERE username = 'admin'";
$result = $conn->query($checkAdminQuery);

if ($result->num_rows === 0) {
    // No existe el usuario admin, se crea uno nuevo con una contraseña por defecto
    $defaultPassword = password_hash('admin123', PASSWORD_DEFAULT);
    $insertAdmin = "
    INSERT INTO users (username, email, password, role)
    VALUES ('admin', 'admin@example.com', '$defaultPassword', 'admin')
    ";

    if ($conn->query($insertAdmin) === TRUE) {
        echo "Usuario `admin` creado con contraseña por defecto.<br>";
    } else {
        echo "Error al crear el usuario `admin`: " . $conn->error . "<br>";
    }
} else {
    echo "Usuario `admin` ya existe.<br>";
}

$conn->close();
header("Location: /app/index.php");
