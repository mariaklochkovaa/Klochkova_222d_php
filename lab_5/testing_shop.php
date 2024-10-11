<?php
require 'shop.php';
try {

    $product = new Product("Пензлі", 100, "Набір пензлів для малювання.");
    $product->getInfo();

    $product_2 = new Product("Рукавички", 300, "Білі рукавички.");

    $discount_product = new DiscountedProduct("Сукня", 1500, "Вечірня червона сукня", 20);
    $discount_product->getInfo();

    $clothes = new Category("Одяг");
    $clothes->addProduct($discount_product);
    $clothes->addProduct($product_2);
    $clothes->showProducts();

    $product_3 = new Product("s", -15, "fff");
}catch (Exception $e){
    echo $e->getMessage();
}