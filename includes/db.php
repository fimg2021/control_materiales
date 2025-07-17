<?php
$host = "127.0.0.1";      // O "localhost"
$user = "root";           // Usuario MySQL (puede ser diferente si lo cambiaste)
$pass = "";               // Contraseña (en XAMPP suele ir vacía)
$dbname = "control_materiales";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
