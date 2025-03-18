<?php
session_start();

function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../views/login.php");
        exit();
    }
}

function redirectIfLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        header("Location: ../views/home.php");
        exit();
    }
}

function isAdmin() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}
?>
