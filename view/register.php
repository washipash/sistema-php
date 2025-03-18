<?php
require 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nombre, $apellido, $correo, $password])) {
        header("Location: login.php");
    } else {
        echo "Error en el registro";
    }
}
?>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>
