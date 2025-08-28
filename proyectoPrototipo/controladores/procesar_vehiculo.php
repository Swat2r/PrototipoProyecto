<?php
include '../modelos/conexiones.php'; // conexión a la base de datos

$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$chofer = $_POST['chofer'];
$capacidad = $_POST['capacidad'];
$estado = $_POST['estado'];

// Verificar si la placa ya existe
$verificar = $conexion->prepare("SELECT id FROM vehiculos WHERE placa = ?");
$verificar->bind_param("s", $placa);
$verificar->execute();
$verificar->store_result();

if ($verificar->num_rows > 0) {
    echo "<script>
        alert('❌ Error: La placa ya está registrada.');
        window.location.href = '../vistas/registro_vehiculo.php';
    </script>";
    exit();
}
$verificar->close();


$sql = "INSERT INTO vehiculos (placa, marca, modelo, chofer, capacidad, estado) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssis", $placa, $marca, $modelo, $chofer, $capacidad, $estado); // 'i' para capacidad entera

if ($stmt->execute()) {
    header("location: ../vistas/lista_vehiculo.php");
    exit();
} else {
    echo "❌ Error al registrar: " . $conexion->error;
}

$stmt->close();
$conexion->close();
?>