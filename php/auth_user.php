<?php
    session_start();
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $pass = md5($pass . "lfo12ek3s");

    $mysql = new mysqli('localhost', 'root', '', 'online-books');

    $result = $mysql->query("SELECT * FROM `customer` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();

    $count = count($user) == 0 || count($user) == 1;

    if ($count) {
        $_SESSION['message'] = "Логин или пароль введены неверно";
        header('Location: /online-books/login.php');
    } else {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'surname' => $user['surname'],
            'patronymic' => $user['patronymic'],
            'phone' => $user['phone'],
            'email' => $user['email'],
            'login' => $user['login'],
            'address' => $user['address'],
        ];

        setcookie('user', $user['name'], time() + 3600, "/");

        // Cookie живет 1 сутки
        // setcookie('user', $user['name'], time() + 3600 * 24);

        $mysql->close();

        header('Location: /online-books/profile.php?id='.$_SESSION['user']['id']);
    }
?>



