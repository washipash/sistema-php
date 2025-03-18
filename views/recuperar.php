<?php
require '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->execute([$correo]);

    if ($stmt->rowCount() > 0) {
        // Aquí enviaríamos un correo con un enlace único de recuperación.
        echo "Se ha enviado un correo de recuperación.";
    } else {
        echo "Correo no registrado.";
    }
}
?>
<form method="POST">
    <input type="email" name="correo" placeholder="Correo" required>
    <button type="submit">Recuperar contraseña</button>
</form>
