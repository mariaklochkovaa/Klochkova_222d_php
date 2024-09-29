<?php
if (isset($_POST["submit"])) {
    session_start();

    $login = $_POST["login"];
    $pass = $_POST["password"];

    $conn = mysqli_connect("MySQL-8.2", "root", "", "users_db");
    $sql = "SELECT password FROM users WHERE username= ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {

        mysqli_stmt_bind_result($stmt, $hashed_password);
        mysqli_stmt_fetch($stmt);

        if (md5($pass) === $hashed_password) {
            $_SESSION['username'] = $login;
            header("Location: Welcome.php");
            exit();
        } else {
            echo "wrong password!";
        }
    } else {
        echo "Wrong login!";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}