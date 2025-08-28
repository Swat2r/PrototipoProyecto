<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}
include "../modelos/conexiones.php";
 
$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM vehiculos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
  echo "Vehículo no encontrado.";
  exit();
}

$vehiculo = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Vehículo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding: 20px; font-family: 'Segoe UI', sans-serif; background-color: #f9f9f9; }
    .form-wrapper { max-width: 500px; margin: auto; }
  </style>
</head>
<body>
  <div class="form-wrapper"> 
    <h5>Editar Vehículo</h5>
    <form action="../controladores/actualizar_vehiculo.php" method="POST">
      <input type="hidden" name="id" value="<?= $vehiculo['id'] ?>">

      <div class="mb-2">
        <label>Placa:</label>
        <input type="text" name="placa" class="form-control" value="<?= $vehiculo['placa'] ?>" required>
      </div>

      <div class="mb-2">
        <label>Marca:</label>
        <input type="text" name="marca" class="form-control" value="<?= $vehiculo['marca'] ?>" required>
      </div>

      <div class="mb-2">
        <label>Modelo:</label>
        <input type="text" name="modelo" class="form-control" value="<?= $vehiculo['modelo'] ?>" required>
      </div>

      <div class="mb-2">
        <label>Chofer:</label>
        <input type="text" name="chofer" class="form-control" value="<?= $vehiculo['chofer'] ?>" required>
      </div>

      <div class="mb-2">
        <label>Capacidad (Kg):</label>
        <input type="number" name="capacidad" class="form-control" value="<?= $vehiculo['capacidad'] ?>" required>
      </div>

      <div class="mb-3">
        <label>Estado:</label>
        <select name="estado" class="form-select" required>
          <option value="Disponible" <?= $vehiculo['estado'] == 'Disponible' ? 'selected' : '' ?>>Disponible</option>
          <option value="En ruta" <?= $vehiculo['estado'] == 'En ruta' ? 'selected' : '' ?>>En ruta</option>
          <option value="Mantenimiento" <?= $vehiculo['estado'] == 'Mantenimiento' ? 'selected' : '' ?>>Mantenimiento</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="lista_vehiculos.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>