<?php
require 'config/auth.php';
redirectIfNotLoggedIn();
if (!isAdmin()) { header("Location: home.php"); exit(); }

$stmt = $conn->query("SELECT * FROM productos");
$productos = $stmt->fetchAll();
?>
<h1>Administrar Productos</h1>
<a href="crear_producto.php">Agregar Producto</a>
<table>
    <tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>
    <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nombre'] ?></td>
            <td><?= $p['precio'] ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
                <a href="editar_producto.php?id=<?= $p['id'] ?>">Editar</a>
                <a href="borrar_producto.php?id=<?= $p['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
