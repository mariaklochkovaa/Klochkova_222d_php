<?php

$name = $_POST["name"];
$surname = $_POST["surname"];

if (empty($name) || empty($surname)) {
    echo "Enter name and surname";
} elseif (is_string($name) && is_string($surname)) {
    echo "Hello, $name $surname";
} else {
    echo "Invalid characters.";
}
?>