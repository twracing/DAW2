<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Clases\ConexionBD;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $pass1   = $_POST['password'] ?? '';
    $pass2   = $_POST['password2'] ?? '';

    if ($usuario === '' || $pass1 === '' || $pass2 === '') {
        $msg = 'Todos los campos son obligatorios.';
    } elseif ($pass1 !== $pass2) {
        $msg = 'Credenciales incorrectas: las contraseñas no coinciden.';
    } else {
        try {
            $pdo = ConexionBD::getConexion();

            // Hash seguro
            $hash = password_hash($pass1, PASSWORD_BCRYPT);

            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
            $stmt->execute([$usuario, $hash]);

            $msg = 'Usuario registrado correctamente.';
        } catch (PDOException $e) {
            if (str_contains($e->getMessage(), 'Duplicate')) {
                $msg = 'El usuario ya existe.';
            } else {
                $msg = 'Error: ' . $e->getMessage();
            }
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body{font-family:Arial;background:#f4f6f8;display:flex;justify-content:center;align-items:center;height:100vh;margin:0}
        .card{background:#fff;padding:20px;border-radius:8px;box-shadow:0 4px 12px rgba(0,0,0,0.1);width:100%;max-width:420px}
        h1{margin-top:0;font-size:20px}
        label{display:block;margin-top:12px;font-weight:bold}
        input{width:100%;padding:8px;margin-top:4px;border:1px solid #ccc;border-radius:6px}
        button{margin-top:16px;width:100%;padding:10px;background:#2b7cff;color:#fff;border:0;border-radius:6px;font-weight:bold;cursor:pointer}
        .msg{margin-top:12px;padding:10px;border-radius:6px}
        .error{background:#ffe0e0;color:#7a1b1b}
        .ok{background:#e0ffe8;color:#1b7a3a}
        a{display:block;margin-top:12px;text-align:center;color:#555;text-decoration:none}
    </style>
</head>
<body>
    <main class="card">
        <h1>Registro</h1>

        <?php if ($msg !== ''): ?>
            <div class="msg <?= str_contains($msg, 'correctamente') ? 'ok' : 'error' ?>">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <label>Usuario</label>
            <input type="text" name="usuario" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <label>Repetir contraseña</label>
            <input type="password" name="password2" required>

            <button type="submit">Registrar</button>
        </form>

        <a href="login.php">Volver al login</a>
    </main>
</body>
</html>
