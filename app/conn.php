<?php
$host = 'localhost';
$db = 'yerbamate';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
