<?php
session_start();
require_once "conexion.php";

header('Content-Type: application/json');
$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validar que los campos requeridos estén presentes
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        $response['message'] = 'Por favor, complete todos los campos.';
        echo json_encode($response);
        exit;
    }

    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $_POST['password'];

    // Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'El formato del correo electrónico no es válido.';
        echo json_encode($response);
        exit;
    }

    // Validar longitud mínima de la contraseña
    if (strlen($password) < 8) {
        $response['message'] = 'La contraseña debe tener al menos 8 caracteres.';
        echo json_encode($response);
        exit;
    }

    // Busca el usuario por email
    $sql = "SELECT id, email, password, nombre_completo, estado FROM usuarios WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verificar si la cuenta está verificada
        if ($user['estado'] !== 'activo') {
            $response['message'] = 'Por favor, verifica tu cuenta de correo electrónico antes de iniciar sesión.';
            echo json_encode($response);
            exit;
        }

        // Verifica la contraseña
        if (password_verify($password, $user['password'])) {
            // Login exitoso
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre_completo'] = $user['nombre_completo'];

            // Manejar "recordar sesión"
            if (isset($_POST['remember_me']) && $_POST['remember_me'] === 'on') {
                $token = bin2hex(random_bytes(32));
                $expiry = date('Y-m-d H:i:s', strtotime('+30 days'));
                
                // Guardar token en la base de datos
                $sql = "INSERT INTO remember_tokens (user_id, token, expiry) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $user['id'], $token, $expiry);
                $stmt->execute();

                // Establecer cookie
                setcookie('remember_token', $token, strtotime('+30 days'), '/', '', true, true);
            }

            $response['success'] = true;
            $response['message'] = 'Inicio de sesión exitoso';
            $response['redirect'] = 'dashboard.php';
        } else {
            $response['message'] = 'Contraseña incorrecta';
        }
    } else {
        $response['message'] = 'No se encontró ninguna cuenta con este correo electrónico';
    }

    $stmt->close();
} else {
    $response['message'] = 'Método de solicitud no válido';
}

echo json_encode($response);
$conn->close();
?>
