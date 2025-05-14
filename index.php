<?php
require_once("config/conexion.php");
if (isset($_POST["enviar"]) && $_POST["enviar"] == "si") {
    require_once("models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Usuario</title>
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Login Usuario</h2>
        <?php
        if (isset($_GET["m"]) && $_GET["m"] == 1) {
            echo '<div class="alert alert-danger">Usuario y/o contraseña incorrectos.</div>';
        } elseif (isset($_GET["m"]) && $_GET["m"] == 2) {
            echo '<div class="alert alert-warning">Los campos están vacíos.</div>';
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="usu_correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="usu_pass" class="form-control" required>
            </div>
            <input type="hidden" name="enviar" value="si">
            <button type="submit" class="btn btn-primary">Acceder</button>
        </form>
    </div>
</body>
</html>