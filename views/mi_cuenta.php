<?php
require '../config/auth.php';
redirectIfNotLoggedIn();
require '../config/database.php';
require 'topbar.php';


$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$user_id]);
$usuario = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];

    $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, correo = ? WHERE id = ?");
    $stmt->execute([$nombre, $apellido, $correo, $user_id]);

    echo "Datos actualizados.";
}
?>
<form method="POST">
    <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
    <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
    <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
    <button type="submit">Actualizar</button>
</form>
