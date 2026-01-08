<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Clases\ConexionBD;

session_start();

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    try {
        $pdo = ConexionBD::getConexion();

        $stmt = $pdo->prepare("SELECT id, password FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {

            session_regenerate_id(true);

            $_SESSION['usuario'] = $usuario;
            $_SESSION['id'] = $row['id'];

            header("Location: reserva.php");
            exit;
        } else {
            $msg = "Credenciales incorrectas.";
        }

    } catch (PDOException $e) {
        $msg = "Error: " . $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body{font-family:Arial;background:#eef1f5;display:flex;justify-content:center;align-items:center;height:100vh;margin:0}
        .card{background:#fff;padding:20px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.1);width:100%;max-width:420px}
        h1{margin-top:0;font-size:20px}
        label{display:block;margin-top:12px;font-weight:bold}
        input{width:100%;padding:8px;margin-top:4px;border:1px solid #ccc;border-radius:6px}
        button{margin-top:16px;width:100%;padding:10px;background:#2b7cff;color:#fff;border:0;border-radius:6px;font-weight:bold;cursor:pointer}
        .msg{margin-top:12px;padding:10px;border-radius:6px;background:#ffe0e0;color:#7a1b1b}
        a{display:block;margin-top:12px;text-align:center;color:#555;text-decoration:none}
    </style>
</head>
<body>
    <main class="card">
        <h1>Iniciar sesión</h1>

        <?php if ($msg !== ''): ?>
            <div class="msg"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Usuario</label>
            <input type="text" name="usuario" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit">Entrar</button>
        </form>

        <a href="registro.php">Registrar usuario</a>
    </main>
</body>
</html>
