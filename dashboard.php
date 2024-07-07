<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

echo "Selamat datang di Dashboard! User ID: " . $_SESSION['user_id'];
?>