<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO proveedor (nombre, direccion, telefono) VALUES (?, ?, ?)";
$stmt= $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $direccion, $telefono);

if ($stmt->execute()) {
    echo "Proveedor agregado con éxito";
} else {
    echo "Error al agregar proveedor: " . $conn->error;
}

$conn->close();
?>

