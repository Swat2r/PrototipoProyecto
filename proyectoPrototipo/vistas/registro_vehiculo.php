<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Vehículo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
    }
    .form-wrapper {
      max-width: 500px;
      margin: 0 auto;
    }
    .form-wrapper h5 {
      font-weight: 600;
      margin-bottom: 20px;
    }
    .form-control,
    .form-select {
      padding: 4px 8px;
      font-size: 0.9rem;
    }
    .btn {
      padding: 6px 16px;
      font-size: 0.9rem;
    }
    label {
      font-size: 0.85rem;
      margin-bottom: 2px;
    }
  </style>
</head>

<body>

  <div class="form-wrapper">
    <h5>Registro de Vehículo</h5>
    <form action="../controladores/procesar_vehiculo.php" method="POST">

      <div class="mb-2">
        <label for="placa">Placa:</label>
        <input type="text" class="form-control" id="placa" name="placa" required>
      </div>

      <div class="mb-2">
        <label for="marca">Marca:</label>
        <input type="text" class="form-control" id="marca" name="marca" required>
      </div>

      <div class="mb-2">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" id="modelo" name="modelo" required>
      </div>

      <div class="mb-2">
        <label for="chofer">Chofer:</label>
        <input type="text" class="form-control" id="chofer" name="chofer" required>
      </div>

      <div class="mb-2">
        <label for="capacidad">Capacidad (Kg):</label>
        <input type="number" class="form-control" id="capacidad" name="capacidad" required>
      </div>

      <div class="mb-3">
        <label for="estado">Estado:</label>
        <select class="form-select" id="estado" name="estado" required>
          <option value="">Selecciona</option>
          <option value="Disponible">Disponible</option>
          <option value="En ruta">En ruta</option>
          <option value="Mantenimiento">Mantenimiento</option>
        </select>
      </div>

      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Registrar</button>
        <a href="menu.php" class="btn btn-outline-secondary">Volver</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>