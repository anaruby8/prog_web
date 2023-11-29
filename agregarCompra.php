<?php
include 'conexion.php';

$idproducto = $_POST['idproducto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// Primero, insertamos la compra
$sqlCompra = "INSERT INTO compra (idproducto, cant, precio) VALUES (?, ?, ?)";
$stmtCompra = $conn->prepare($sqlCompra);
$stmtCompra->bind_param("iid", $idproducto, $cantidad, $precio);

if (!$stmtCompra->execute()) {
    echo " Error al registrar compra: " . $conn->error;
    $conn->close();
    exit();
}

// Luego, actualizamos el stock en el almacén
$sqlUpdate = "UPDATE almacen SET stock = stock + ? WHERE id = ?";
$stmtUpdate = $conn->prepare($sqlUpdate);
$stmtUpdate->bind_param("ii", $cantidad, $idproducto);

if ($stmtUpdate->execute()) {
    echo " Compra registrada y stock actualizado con éxito";
} else {
    echo "Error al actualizar el stock: " . $conn->error;
}

$conn->close();
?>
