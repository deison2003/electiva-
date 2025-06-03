<?php
// filepath: c:\xampp\htdocs\gisella\conexion.php

$host = "localhost";
$user = "root";
$pass = ""; // Por defecto en XAMPP, la contraseña está vacía
$db   = "exploraquibdo";

$conn = new mysqli($host, $user, $pass, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Opcional: para usar UTF-8
$conn->set_charset(charset: "utf8");
?>