<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $item = $_POST['item'];
    $_SESSION['cart'][] = $item;

    if (!isset($_COOKIE['previous_purchases'])) {
        $previous_purchases = [];
    } else {
        $previous_purchases = json_decode($_COOKIE['previous_purchases'], true);
    }

    $previous_purchases[] = $item;
    setcookie('previous_purchases', json_encode($previous_purchases), time() + (86400 * 30));
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Корзина покупок</h1>
<form method="POST">
    <label for="item">Додати товар:</label>
    <input type="text" name="item">
    <button type="submit" name="add_to_cart">Додати</button>
</form>

<h2>Товари в корзині:</h2>
<ul>
    <?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            echo "<li>$cart_item</li>";
        }
    } else {
        echo "Корзина пуста";
    }
    ?>
</ul>

<form method="POST">
    <button type="submit" name="clear_cart">Очистити корзину</button>
</form>

<h2>Попередні покупки:</h2>
<ul>
    <?php
    if (isset($_COOKIE['previous_purchases'])) {
        $previous_purchases = json_decode($_COOKIE['previous_purchases'], true);
        foreach ($previous_purchases as $previous_item) {
            echo "<li>$previous_item</li>";
        }
    } else {
        echo "<li>Неає попередніх покупок</li>";
    }
    ?>
</ul>
</body>
</html>
