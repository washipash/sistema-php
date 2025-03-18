<?php
require '../config/auth.php';
redirectIfNotLoggedIn();
require '../config/database.php';
require 'topbar.php';


$stmt = $conn->query("SELECT * FROM productos");
$productos = $stmt->fetchAll();
?>
<h1>Lista de productos</h1>

<table>
    <tr><th>Nombre</th><th>Precio</th><th>Stock</th><th>Ver</th></tr>
    <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['nombre']) ?></td>
            <td><?= htmlspecialchars($p['precio']) ?></td>
            <td><?= htmlspecialchars($p['stock']) ?></td>
            <td><a href="producto.php?id=<?= $p['id'] ?>">Ver</a></td>
        </tr>
    <?php endforeach; ?>
</table>
