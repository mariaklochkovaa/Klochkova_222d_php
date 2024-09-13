<?php
//завдання 5
$text = $_POST['text'];
$file = fopen("log.txt", "a+");

if ($file) {
    fwrite($file, $text."\n");

} else {
    echo 'Не вдалося відкрити файл для запису.';
}
rewind($file);
$contents  = fread($file, filesize("log.txt"));
fclose($file);
echo $contents;


