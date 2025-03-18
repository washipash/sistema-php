<?php
require '../config/database.php';

class UserController {
    public static function getAllUsers() {
        global $conn;
        return $conn->query("SELECT id, nombre, apellido, correo, rol FROM usuarios")->fetchAll();
    }

    public static function deleteUser($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
