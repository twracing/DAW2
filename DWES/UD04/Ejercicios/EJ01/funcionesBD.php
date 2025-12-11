<?php
require_once "ConexionBD.php";

function getEquipos() {
    $pdo = ConexionBD::getConexion();

    $sql = "SELECT nombre FROM equipos ORDER BY nombre";
    $stmt = $pdo->query($sql);

    return $stmt->fetchAll();   // por defecto FETCH_ASSOC
}
?>
