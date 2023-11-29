<?php
include 'conexion.php';

$descripcion = $_POST['descripcion'];
$min = $_POST['min'];
$maximo = $_POST['maximo'];
$stock = $_POST['stock'];

$sql = "INSERT INTO almacen (descripcion, min, maximo, stock) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siii", $descripcion, $min, $maximo, $stock);

if ($stmt->execute()) {
    echo " Producto agregado al almacén con éxito";
} else {
    echo " Error al agregar producto al almacén: " . $conn->error;
}

$conn->close();
?>

