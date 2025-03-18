<?php
require '../config/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['contrasena'];

    $stmt = $conn->prepare("SELECT id, nombre, contrasena, rol FROM usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($password, $usuario['contrasena'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_name'] = $usuario['nombre'];
        $_SESSION['user_role'] = $usuario['rol'];

        header("Location: home.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos";
    }
}
?>
<form method="POST">
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>

<!-- Botón para ir a la página de registro -->
<a href="register.php">
    <button type="button">Registrarse</button>
</a>
