<?php
//завдання 6
$files = scandir("uploads");

$files = array_diff($files, array('.', '..'));

foreach ($files as $file) {
    $filePath = "uploads" . '/' . $file;
    echo "<br><a href='$filePath' download>$file</a></br>";


}