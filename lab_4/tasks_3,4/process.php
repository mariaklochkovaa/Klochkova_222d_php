<?php
if (isset($_POST["submit"])) {
    $login = $_POST["login"];
    $pass = $_POST["password"];

    $conn = mysqli_connect("MySQL-8.2", "root", "", "users_db");
    $sql = "SELECT password FROM users WHERE username= ?";
    // 4 завдання
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {

        mysqli_stmt_bind_result($stmt, $hashed_password);
        mysqli_stmt_fetch($stmt);

        if (password_verify($pass, $hashed_password)) {
            echo "Hi, $login!";
        } else {
            echo "wrong password!";
        }
    } else {
        echo "Wrong login!";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}