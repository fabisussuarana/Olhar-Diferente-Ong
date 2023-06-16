<?php
    session_start();

    include './vendor/autoload.php';

    if (!isset($_SESSION['token']) && $_SESSION['token'] == null) {
        header('Location: ' . URL . '/login.php');
        exit;
    }

    
?>