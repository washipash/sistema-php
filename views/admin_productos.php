<?php
require '../config/auth.php';
require '../config/database.php';
redirectIfNotLoggedIn();

require 'topbar.php';
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    
    // Manejo de la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $ruta_destino = "uploads/" . $imagen_nombre;

    if (move_uploaded_file($imagen_temp, $ruta_destino)) {
        // Insertar en la base de datos
        $stmt = $conn->prepare("INSERT INTO productos (nombre, precio, stock, descripcion, imagen) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$nombre, $precio, $stock, $descripcion, $ruta_destino])) {
            $mensaje = "✅ Producto añadido correctamente.";
        } else {
            $mensaje = "❌ Error al añadir el producto.";
        }
    } else {
        $mensaje = "❌ Error al subir la imagen.";
    }
}
?>

<h1>Añadir Producto</h1>
<p><?= $mensaje ?></p>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre del producto" required>
    <input type="number" name="precio" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Añadir Producto</button>
</form>
