<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}

include "../modelos/conexiones.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Sanitizar el ID para evitar inyecciones

    $sql = "DELETE FROM vehiculos WHERE id = $id";
    if ($conexion->query($sql) === TRUE) {
        header("Location: ../vistas/lista_vehiculo.php?msg=eliminado");
        exit();
    } else {
        header("Location: ../vistas/lista_vehiculo.php?msg=error");
        exit();
    }
} else {
    header("Location: ../vistas/lista_vehiculo.php?msg=error");
    exit();
}
?>