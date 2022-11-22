<?php
    session_start();
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
    $patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $city_name = filter_var(trim($_POST['city_name']), FILTER_SANITIZE_STRING);

        $mysql = new mysqli('localhost', 'root', '', 'online-books');
        $result = $mysql->query("SELECT * FROM `customer` WHERE `id` = '".$_SESSION['user']['id']."'");

        $mysql->query("
                UPDATE `customer`
                    SET `name` = '$name', `surname` = '$surname', `patronymic` = '$patronymic', `phone` = '$phone', `email` = '$email', `address` = '$address', `city_name` = '$city_name'
                WHERE `id` = '".$_SESSION['user']['id']."'"
        );

        if ($result) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['surname'] = $surname;
            $_SESSION['user']['patronymic'] = $patronymic;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['address'] = $address;
            $_SESSION['user']['city_name'] = $city_name;
            $_SESSION['success'] = "Данные обновлены!";
        } else {
            $_SESSION['error'] = "Данные не обновлены!";
        }

$mysql->close();
        header('Location: /online-books/profile.php?id='.$_SESSION['user']['id']);