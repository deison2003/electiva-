<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "exploraquibdo";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $correo = $conn->real_escape_string(trim($_POST['correo']));
    $telefono = $conn->real_escape_string(trim($_POST['telefono'] ?? ''));
    $contraseña = $_POST['contraseña'];
    $confirmar = $_POST['confirmar'];
    $tipo_usuario = "turista";
    $token_verificacion = bin2hex(random_bytes(32)); // Generar token único

    // Validaciones
    if (empty($nombre) || empty($correo) || empty($contraseña)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El formato del correo electrónico no es válido.";
    } elseif ($contraseña !== $confirmar) {
        $mensaje = "Las contraseñas no coinciden.";
    } elseif (strlen($contraseña) < 8) {
        $mensaje = "La contraseña debe tener al menos 8 caracteres.";
    } else {
        $hash = password_hash($contraseña, PASSWORD_DEFAULT);
        
        // Insertar usuario con estado pendiente y token de verificación
        $sql = "INSERT INTO usuarios (tipo_usuario, nombre_completo, correo, contraseña, telefono, estado, token_verificacion) 
                VALUES (?, ?, ?, ?, ?, 'pendiente', ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $tipo_usuario, $nombre, $correo, $hash, $telefono, $token_verificacion);
        
        if ($stmt->execute()) {
            // Enviar correo de verificación (implementar esta función)
            enviarCorreoVerificacion($correo, $nombre, $token_verificacion);
            
            header("Location: registro_exitoso.php");
            exit();
        } else {
            if ($conn->errno == 1062) {
                $mensaje = "El correo ya está registrado.";
            } else {
                $mensaje = "Error al registrar: " . $conn->error;
            }
        }
        $stmt->close();
    }
}

function enviarCorreoVerificacion($correo, $nombre, $token) {
    // Implementación real requeriría un servidor SMTP
    $asunto = "Verifica tu cuenta en ExploraQuibdó";
    $enlace = "http://tudominio.com/verificar.php?token=$token";
    $mensaje = "Hola $nombre,\n\nPor favor verifica tu cuenta haciendo clic en el siguiente enlace:\n$enlace";
    
    // En un entorno real usarías mail() o una librería como PHPMailer
    // mail($correo, $asunto, $mensaje);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ExploraQuibdó</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;600&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #F5F5F5;
            font-family: 'Open Sans', sans-serif;
        }
        .login-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h2 {
            font-family: 'Montserrat', sans-serif;
            color: #2c3e50;
        }
        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="login-form w-100" style="max-width:400px;">
            <h2 class="mb-4 text-center">Registro</h2>
            <?php if ($mensaje): ?>
                <div class="alert alert-danger"><?php echo $mensaje; ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono (opcional)</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    <small class="text-muted">Mínimo 8 caracteres</small>
                </div>
                <div class="mb-3">
                    <label for="confirmar" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="confirmar" name="confirmar" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php" class="text-primary">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>