<?php
require_once("config/conexion.php");

class Usuario extends Conexion {
    public function login() {
        $conectar = parent::conectar();
        $correo = $_POST["usu_correo"];
        $pass = $_POST["usu_pass"];

        if(empty($correo) or empty($pass)){
            header("Location:index.php?m=2");
            exit();
        }

        $sql = "SELECT * FROM usuarios WHERE correo=? AND password=?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $correo);
        $stmt->bindValue(2, $pass);
        $stmt->execute();
        $resultado = $stmt->fetch();

        if(is_array($resultado)){
            session_start();
            $_SESSION["id_usuario"] = $resultado["id_usuario"];
            $_SESSION["nombre"] = $resultado["nombre"];
            header("Location:dashboard.php");
        } else {
            header("Location:index.php?m=1");
        }
    }
}
?>