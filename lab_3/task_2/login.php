<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login == 'user' && $password == '123') {
        $_SESSION['user'] = $login;
        header('Location: welcome.php');
        exit();
    } else {
        echo 'Невірний логін або пароль';
    }
}
?>
