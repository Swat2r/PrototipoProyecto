
<?php
session_start();
include '../modelos/conexiones.php'; // conexión a la BD

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = SHA2(?, 256)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $_SESSION['usuario'] = $usuario;
    header("Location: ../vistas/menu.php");
} else {
    header("Location: ../vistas/login.php?error=1");
}
?>