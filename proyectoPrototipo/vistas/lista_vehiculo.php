<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include "../modelos/conexiones.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Vehículos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/lista_vehiculo.css">
  
</head>
<body>
<div class="container mt-5">
  <h2>Vehículos Registrados 🚛</h2>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Chofer</th>
        <th>Capacidad (Kg)</th>
        <th>Estado</th>
        <th>Registrado</th>
        <th>Opcion</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT `id`, `placa`, `marca`, `modelo`, `chofer`, `capacidad`, `estado`, `registrado_en` FROM `vehiculos`";
      $resultado = $conexion->query($sql);
      if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
          echo "<tr>
                  <td>{$fila['id']}</td>
                  <td>{$fila['placa']}</td>
                  <td>{$fila['marca']}</td>
                  <td>{$fila['modelo']}</td>
                  <td>{$fila['chofer']}</td>
                  <td>{$fila['capacidad']}</td>
                  <td>{$fila['estado']}</td>
                  <td>{$fila['registrado_en']}</td>
                  <td>
                      <a href='editar_vehiculo.php?id={$fila['id']}' class='btn btn-sm btn-primary'>Editar</a>
                      <a href='../controladores/eliminar_vehiculo.php?id={$fila['id']}'
                         class='btn btn-sm btn-danger'
                         onclick=\"return confirm('⚠️ ¿Seguro que deseas eliminar este vehículo?');\">
                         Eliminar
                      </a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='9'>No hay vehículos registrados.</td></tr>";
      }
      ?>
    </tbody>
    
  </table>
  <table class="text">
        <tr>
            <th>Acciones:</th>
        </tr>
    </table>
    <br>
    <td>
        <a href="menu.php" class="btn btn-secondary">⬅ Volver al Menú</a>
    </td>
</div>
</body>
</html>