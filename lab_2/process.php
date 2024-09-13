<?php
//завдання 2
if (is_uploaded_file($_FILES['user_file']['tmp_name'])){

    $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    $fileType = $_FILES['user_file']['type'];
    $fileSize = $_FILES['user_file']['size'];

    $maxFileSize = 2 * 1024 * 1024;

    if(in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
        $uploaddir = 'D:/prog/OSPanel/home/example.local/lab_2/uploads/';
        $filePath = $uploaddir . $_FILES['user_file']['name'];


        if (move_uploaded_file($_FILES['user_file']['tmp_name'], $filePath)) {
            echo "Файл завантажений";
        }

        //завдання 4
        if (file_exists($filePath)) {
            $uniqueSuffix = rand(1, 10000);
            $pathInfo = pathinfo($filePath);
            $newName = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_' . $uniqueSuffix . '.' . $pathInfo['extension'];
            rename($filePath, $newName);
            $filePath = $newName;
        }

        //завдання 3
        echo"<br> Ім'я файлу:".basename($filePath)."<br>";
        echo"Тип:".$fileType."<br>";
        echo"Розмір".round($fileSize/ 1024, 2). " КБ<br>";

        $fileUrl = '/lab_2/uploads/' . basename($filePath);
        echo "<a href='$fileUrl' download>Завантажити файл</a>";
    } else {
        echo "недопустимий тип файлу або файл перевищує 2 МБ.";
    }
}
