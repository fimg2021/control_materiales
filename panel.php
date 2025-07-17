<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html><body>
<h2>Panel de Control</h2>
<p>Bienvenido, <?php echo $_SESSION["usuario"]; ?> (<?php echo $_SESSION["rol"]; ?>)</p>
<ul>
    <li><a href="agregar_material.php">➕ Agregar Material</a></li>
    <li><a href="entregar_ot.php">📦 Entregar a OT</a></li>
    <li><a href="crear_ot.php">🧾 Crear nueva OT</a></li>
    <li><a href="reporte_stock.php">📊 Ver reporte</a></li>
</ul>
<a href="logout.php">Cerrar sesión</a>
</body></html>