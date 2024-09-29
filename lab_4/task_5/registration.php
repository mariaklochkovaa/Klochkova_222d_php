<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = md5($password);

    $conn = mysqli_connect("MySQL-8.2", "root", "", "users_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);

    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('Location: authorization_page.html');
    exit();
}
?>
