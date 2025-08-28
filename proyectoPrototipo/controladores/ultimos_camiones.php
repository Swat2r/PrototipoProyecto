<?php
include "../modelos/conexiones.php";

$sql = "SELECT v.placa, v.chofer, s.destino, s.hora_salida
        FROM salidas s
        INNER JOIN vehiculos v ON v.id = s.id_vehiculo
        ORDER BY s.hora_salida DESC
        LIMIT 5";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '  <div class="card bg-dark text-light shadow-lg mb-3">';
        echo '    <div class="card-body">';
        echo '      <h5 class="card-title"><i class="bi bi-truck"></i> ' . $fila['placa'] . '</h5>';
        echo '      <p><strong>Chofer:</strong> ' . $fila['chofer'] . '</p>';
        echo '      <p><strong>Destino:</strong> ' . $fila['destino'] . '</p>';
        echo '      <small><strong>Hora:</strong> ' . $fila['hora_salida'] . '</small>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo "<p class='text-muted'>No hay salidas registradas aún.</p>";
}
?>