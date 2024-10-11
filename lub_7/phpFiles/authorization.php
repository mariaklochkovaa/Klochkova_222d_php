<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $conn = mysqli_connect("MySQL-8.2", "root", "", "lub_7");
    $sql = "SELECT password, id FROM users WHERE email= ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {

        mysqli_stmt_bind_result($stmt, $hashed_password, $id);
        mysqli_stmt_fetch($stmt);

        if (md5($pass) === $hashed_password) {
            $_SESSION['id'] = $id;
            echo json_encode(["success" => true]);

        } else {
            $message = "Невірний пароль";
            echo json_encode(["success" => false, "message" => $message]);

        }
    } else {
        $message = "Користувача з таким email не існує";
        echo json_encode(["success" => false, "message" => $message]);

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}