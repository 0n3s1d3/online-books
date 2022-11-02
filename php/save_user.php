<?php

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
$cityId = filter_var(trim($_POST['cityId']), FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90){
    echo "Недопустимая длина логина";
    exit();
}
else if(mb_strlen($login) < 5){
    echo "Недопустимая длина логина.";
    exit();
} // Проверяем длину имени

$pass = md5($pass."thisisforhabr"); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'root', '', 'online-books');

$result1 = $mysql->query("SELECT * FROM `customer` WHERE `login` = '$login'");
$user1 = $result1->fetch_assoc(); // Конвертируем в массив
if(!empty($user1)){
    echo "Данный логин уже используется!";
    exit();
}

$mysql->query("INSERT INTO `customer` (`login`, `pass`)
	VALUES('$login', '$pass')");
$mysql->close();