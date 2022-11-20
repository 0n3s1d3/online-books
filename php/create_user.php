<?php
    session_start();

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
    $patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $pass_confirm = filter_var(trim($_POST['pass_confirm']), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $cityId = filter_var(trim($_POST['cityId']), FILTER_SANITIZE_STRING);

    if (mb_strlen($pass) > 5 && mb_strlen($pass_confirm) > 5 && $pass === $pass_confirm) {
        $pass = md5($pass . "lfo12ek3s");

        $mysql = new mysqli('localhost', 'root', '', 'online-books');

        $result = $mysql->query("SELECT * FROM `customer` WHERE `login` = '$login'");
        $user = $result->fetch_assoc(); // Конвертируем в массив

        $result2 = $mysql->query("INSERT INTO `customer` (`name`, `surname`, `patronymic`, `phone`, `email`, `login`, `pass`, `address`, `cityId`)
                          VALUES ('$name', '$surname', '$patronymic', '$phone', '$email', '$login', '$pass', '$address', 1) ");
        $mysql->close();
        $_SESSION['success'] = "Регистрация прошла успешно!";
        header('Location: /online-books/login.php');

    } else {
        if (!empty($user['id'])) {
            $_SESSION['message'] = "Данный логин уже используется!";
            header('Location: /online-books');
        }
        $_SESSION['message'] = 'Пароли не совпадают или длина меньше 5';
        header('Location: /online-books');
    }
?>