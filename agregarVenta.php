<?php
include 'conexion.php';

$idproducto = $_POST['idproducto'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Primero, insertamos la venta
$sqlVenta = "INSERT INTO salida (fecha, hora, idproducto, cantidad) VALUES (?, ?, ?, ?)";
$stmtVenta = $conn->prepare($sqlVenta);
$stmtVenta->bind_param("ssii", $fecha, $hora, $idproducto, $cantidad);

if (!$stmtVenta->execute()) {
    echo "Error al registrar venta: " . $conn->error;
    $conn->close();
    exit();
}

// Luego, actualizamos el stock en el almacén
$sqlUpdate = "UPDATE almacen SET stock = stock - ? WHERE id = ?";
$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bind_param("ii", $cantidad, $idproducto);

if ($stmtUpdate->execute()) {
    echo " Venta registrada y stock actualizado con éxito";
} else {
    echo " Error al actualizar el stock: " . $conn->error;
}

$conn->close();
?>

