<?php
class Conexion {
    protected $db;
    protected function conectar() {
        try {
            $conectar = $this->db = new PDO("mysql:host=localhost;dbname=mi_login_db", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage();
            die();
        }
    }
}
?>