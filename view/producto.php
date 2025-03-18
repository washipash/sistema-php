<?php
require '../config/auth.php';
redirectIfNotLoggedIn();
require '../config/database.php';

if (!isset($_GET['id'])) {
    echo "Producto no encontrado.";
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch();

if (!$producto) {
    echo "Producto no encontrado.";
    exit();
}
?>
<h1><?= htmlspecialchars($producto['nombre']) ?></h1>
<img src="<?= htmlspecialchars($producto['imagen']) ?>" width="200">
<p>Precio: <?= htmlspecialchars($producto['precio']) ?></p>
<p>Stock: <?= htmlspecialchars($producto['stock']) ?></p>
<p>Descripción: <?= htmlspecialchars($producto['descripcion']) ?></p>
<a href="productos.php">Volver</a>
