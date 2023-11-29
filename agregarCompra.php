<?php
include 'conexion.php';

$idproducto = $_POST['idproducto'];
$idproveedor = $_POST['idproveedor'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$sql = "INSERT INTO compra (idproducto, idproveedor, cant, precio) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiid", $idproducto, $idproveedor, $cantidad, $precio);

if ($stmt->execute()) {
    echo "Compra registrada con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
