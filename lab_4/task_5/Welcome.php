<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: authorization_page.html");
    exit;
}

echo "Welcome " . $_SESSION['username'] . "!";

if(isset($_POST["logout"])){
    session_start();
    session_destroy();
    header("Location: authorization_page.html");
    exit();
}
?>

<html>
<form method="post">
    <input type="submit" name="logout" id="logout" value="Logout"></input>
</form>
</html>
