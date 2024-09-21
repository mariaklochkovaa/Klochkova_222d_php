<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: errorPage.html');
    exit();
}
$client_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$script_name = $_SERVER['PHP_SELF'];
$request_method = $_SERVER['REQUEST_METHOD'];
$server_path = $_SERVER['SCRIPT_FILENAME'];

echo "IP-адреса клієнта: $client_ip<br>";
echo "Назва та версія браузера: $user_agent<br>";
echo "Назва скрипта, що виконується: $script_name<br>";
echo "Метод запиту: $request_method<br>";
echo "Шлях до файлу на сервері: $server_path<br>";
?>

