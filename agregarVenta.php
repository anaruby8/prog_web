<?php
include 'conexion.php';

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$idproducto = $_POST['idproducto'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO salida (fecha, hora, idproducto, cantidad) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $fecha, $hora, $idproducto, $cantidad);

if ($stmt->execute()) {
    echo "Venta registrada con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
