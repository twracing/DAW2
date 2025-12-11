<?php 
declare(strict_types=1);
 
namespace App;
 
use PDO;
use PDOException;
use Dotenv\Dotenv;
 
final class ConexionBD
{
    private static ?PDO $instancia = null;
 
    private function __construct() {}
    private function __clone() {}
 
    public static function getConexion(): PDO
    {
        if (self::$instancia instanceof PDO) {
            return self::$instancia;
        }
 
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
 
        $dsn  = $_ENV['BD_DSN']      ?? '';
        $user = $_ENV['dwes_01_nba'] ?? '';
        $pass = $_ENV[''] ?? '';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ];
 
        try {
            self::$instancia = new PDO($dsn, $user, $pass, $options);
            return self::$instancia;
        } catch (PDOException $e) {
            // Manejo limpio según código MySQL
            $msg = match ($e->getCode()) {
                1049 => 'Base de datos no encontrada',
                1045 => 'Acceso denegado',
                2002 => 'Conexión rechazada',
                default => 'Error desconocido',
            };
            throw new PDOException($msg . ' (' . $e->getMessage() . ')', (int)$e->getCode());
        }
    }
}
 
 
?>