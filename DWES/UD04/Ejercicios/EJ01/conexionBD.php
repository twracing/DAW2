<?php
class ConexionBD {

    private static function cargarEnv() {
        $ruta = __DIR__ . "/.env";
        if (!file_exists($ruta)) return;

        $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lineas as $linea) {
            list($k, $v) = explode("=", $linea, 2);
            $_ENV[$k] = $v;
        }
    }

    public static function getConexion() {
        self::cargarEnv();

        $dsn = $_ENV["BD_DNS"];
        $user = $_ENV["BD_USERNAME"];
        $pass = $_ENV["BD_PASSWORD"];

        try {
            return new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("❌ Error al conectar a la BD: " . $e->getMessage());
        }
    }
}
?>
