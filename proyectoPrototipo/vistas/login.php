<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PAPELERA J&M</title>

  <?php include "../vistas/referencia.php"; ?>

  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <script src="../js/login.js"></script>
</head>
<body>
  <div class="container">
    <div class="logo-titulo">
      <h1 class="empresa-titulo">Papelera J&M srl.</h1>
    </div>
    
    <div class="login-container">
      <h2>INICIAR SESIÓN</h2>
      <form method="POST" action="../controladores/procesar_login.php">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
      </form>

      <?php
        if (isset($_GET['error'])) {
          echo '<p style="color:red;">Credenciales inválidas</p>';
        }
      ?>
    </div>
  </div>
</body>
</html>