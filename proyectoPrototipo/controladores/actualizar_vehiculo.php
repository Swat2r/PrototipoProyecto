<?php
include '../modelos/conexiones.php';

$id = $_POST['id'];
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$chofer = $_POST['chofer'];
$capacidad = $_POST['capacidad'];
$estado = $_POST['estado'];


$sql = "UPDATE vehiculos 
        SET placa = ?, 
            marca = ?, 
            modelo = ?, 
            chofer = ?, 
            capacidad = ?, 
            estado = ?
        WHERE id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssisi", $placa, $marca, $modelo, $chofer, $capacidad, $estado, $id);

if ($stmt->execute()) {
    header("Location: ../vistas/lista_vehiculo.php/");
    exit();
} else {
    echo "❌ Error al actualizar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
