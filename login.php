<?php
    session_start();

    require_once "database/connect.php";
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="partial/css/normalize.css">
    <link rel="stylesheet" href="partial/css/bootstrap.min.css">
    <link rel="stylesheet" href="partial/css/all.css">
    <link rel="stylesheet" href="partial/css/style.css">
    <title>Авторизация</title>
</head>
<body>
<div class="container form-container">
    <div class="form-style bg-light">
        <ul class="nav nav-border" id="modalsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="auth_tab"
                        data-bs-toggle="tab" data-bs-target="#auth"
                        type="button" role="tab" aria-controls="auth" aria-selected="true"
                >Вход</button>
            </li>
        </ul>

        <div class="tab-content" id="modalsTabContent">
            <div class="tab-pane fade show active" id="auth" role="tabpanel" aria-labelledby="auth_tab">
                <form action="php/auth_user.php" method="post">
                    <?php
                        if($_SESSION['success']) {
                            echo '<p class="text-center text-success">'. $_SESSION['success'] .'</p>';
                        } unset($_SESSION['success']);
                    ?>
                    <?php
                        if($_SESSION['message']) {
                            echo '<p class="text-center text-danger">'. $_SESSION['message'] .'</p>';
                        } unset($_SESSION['message']);
                    ?>
                    <div class="d-flex justify-content-center modal-inputs col-12">
                        <div class="col-lg-8 col-12">
                            <div class="form-floating mb-2">
                                <input class="form-control" type="text" name="login" id="login" placeholder="Логин">
                                <label for="login">Логин</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="password" name="pass" id="pass" placeholder="Пароль">
                                <label for="pass">Пароль</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-action">
                        <button type="submit" class="btn btn-blue">Войти</button>
                    </div>
                </form>
                <p class="text-center">Еще не зарегистрированы? <a href="index.php" class="link-primary">Зарегистрироваться</a></p>
            </div>
        </div>
    </div>
</div>



<script src="partial/js/bootstrap.bundle.min.js"></script>
<script src="partial/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
</body>
</html>
