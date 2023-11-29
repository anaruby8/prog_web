<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "almacen";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequear conexión
// Chequear conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
} else {
  echo "¡Conexión exitosa!";
}
?>
