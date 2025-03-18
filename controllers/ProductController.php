<?php
require '../config/database.php';

class ProductController {
    public static function getAllProducts() {
        global $conn;
        return $conn->query("SELECT * FROM productos")->fetchAll();
    }

    public static function deleteProduct($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
