<?php // Відкриває блок коду        завдання 1
echo "Hello world!";// Виведення на екран "Hello World!"

//завдання 2
$str = "ffff";
$int = 5;
$float = 3.14;
$bool = true;
echo "<br> str: " . $str . "<br>";
echo "int: " . $int . "<br>";
echo "float: " . $float . "<br>";
echo "bool: " . $bool . "<br>";

var_dump($str);
var_dump($int);
var_dump($float);
var_dump($bool);

//завдання 3
$str_1 = "Hello";
$str_2 = "world";
$result = $str_1 . $str_2;
echo "<br>" . $result;

//завдання 4
$a = 10;
if ($a % 2 == 0) {
    echo "<br> парное <br>";
}else{
    echo "<br> не парное <br>";
}

//завдання 5
for ($i = 1; $i <= 10; $i++) {
    echo $i . "<br>";
}

$i = 10;
while ($i > 0) {
    echo $i . "<br>";
    $i--;
}

//завадння 6
$student = [
    "name" => "Harry",
    "surname" => "Potter",
    "age" => 18,
    "specialty" => "computer science"
];
print_r($student);

$student["average score"] = 3.4;
print_r($student);
?>

