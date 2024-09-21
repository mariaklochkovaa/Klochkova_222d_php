<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    setcookie('username', $name, time() + (86400 * 7));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_COOKIE['username'])) {
    echo "Привіт, " . $_COOKIE['username'];
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (!isset($_COOKIE['username'])) {
    echo "Сookie видалені";
}

