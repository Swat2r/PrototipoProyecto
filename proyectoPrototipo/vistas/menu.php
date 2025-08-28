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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menú Principal - Papelera J&M</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Iconos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Fuente -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

  <!-- Conexión BD -->
  <?php include "../modelos/conexiones.php"; ?>

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      overflow-x: hidden;
    }
    #toggleBtn {
      position: absolute;
      top: 15px;
      left: 15px;
      font-size: 28px;
      cursor: pointer;
      color: #343a40;
      z-index: 1001;
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: -260px;
      width: 250px;
      height: 100%;
      background: #212529;
      color: white;
      transition: all 0.3s;
      padding-top: 20px;
      z-index: 1000;
    }
    .sidebar.active {
      left: 0;
    }
    .sidebar .admin {
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar .admin img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      border: 2px solid white;
    }
    .sidebar a {
      display: block;
      color: white;
      padding: 12px 20px;
      text-decoration: none;
      transition: 0.2s;
    }
    .sidebar a:hover {
      background: #495057;
    }
    .content {
      margin-left: 20px;
      padding: 20px;
    }
    .bienvenida {
      text-align: center;
      margin-top: 70px;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>

<!-- Botón hamburguesa -->
<i id="toggleBtn" class="bi bi-list"></i>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
  <div class="admin">
    <img src="../img/icono.jpeg" alt="Administrador">
    <h5><?php echo $_SESSION['usuario']; ?></h5>
  </div>
  <a href="menu.php"><i class="bi bi-house"></i> Inicio</a>
  <a href="registro_vehiculo.php"><i class="bi bi-truck"></i> Registrar Vehículo</a>
  <a href="lista_vehiculo.php"><i class="bi bi-card-list"></i> Ver Vehículos</a>
  <a href="#"><i class="bi bi-bar-chart"></i> Reportes</a>
  <a href="../controladores/cerrar_sesion.php"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>
</div>


<div class="content">
  <div class="bienvenida">
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> 🎉</h2>
    <p>Selecciona una opción desde el menú lateral.</p>
  </div>

  >
  <div class="container mt-4">
    <h3 class="mb-3">🚚 Últimos Camiones que Salieron</h3>
    <div class="row" id="contenedorCamiones">
      <!-- Aquí se cargarán dinámicamente los camiones -->
    </div>
  </div>
</div>

<script>
  const toggleBtn = document.getElementById("toggleBtn");
  const sidebar = document.getElementById("sidebar");
  toggleBtn.onclick = function() {
    sidebar.classList.toggle("active");
  }

  // 🔄 función para cargar camiones con fetch
  function cargarCamiones() {
    fetch("../controladores/ultimos_camiones.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("contenedorCamiones").innerHTML = data;
      })
      .catch(error => console.error("Error cargando camiones:", error));
  }

  // cargar al inicio
  cargarCamiones();

  // refrescar cada 10 segundos
  setInterval(cargarCamiones, 10000);
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>