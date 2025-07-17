<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["usuario"];
    $pass = $_POST["clave"];
    include("includes/db.php");
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if ($pass === $row["contraseña"]) {
            $_SESSION["usuario"] = $row["usuario"];
            $_SESSION["rol"] = $row["rol"];
            header("Location: panel.php");
            exit;
        }
    }
    $error = "Usuario o contraseña incorrectos";
}
?>
<!DOCTYPE html>
<html><body>
<h2>Iniciar Sesión</h2>
<form method="POST">
    Usuario: <input name="usuario"><br>
    Clave: <input type="password" name="clave"><br>
    <button type="submit">Entrar</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
</body></html>