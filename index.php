<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: views/home.php");
} else {
    header("Location: views/login.php");
}
exit();
?>
