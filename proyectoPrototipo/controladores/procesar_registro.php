<?php
include '../modelos/conexiones.php'; // conexión BD

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO usuarios( usuario, contrasena) VALUES (?, SHA2(?, 256))";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar: " . $conexion->error;
}
?>