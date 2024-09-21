<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.html');
    exit();
}else{
    echo "Привіт ".$_SESSION['user'];
}

if (isset($_POST['exit'])) {
    session_unset();
    session_destroy();
    header('Location: index.html');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post">
    <button type="submit" name="exit">Вийти</button>
</form>
</body>
</html>