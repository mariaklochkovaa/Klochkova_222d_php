<?php
session_start();

if (isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > 300) {
        session_unset();
        session_destroy();
        header("Location: index.html");
        exit();
    }
}

echo "Час останої активності: ".date("H:i:s", $_SESSION['last_activity']);

$_SESSION['last_activity'] = time();