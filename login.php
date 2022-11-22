<?php
session_start();

require_once "database/connect.php";
if (isset($_SESSION['user'])) {
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
    <div class="form-style card">
        <ul class="nav nav-border" id="modalsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="auth_tab"
                        data-bs-toggle="tab" data-bs-target="#auth"
                        type="button" role="tab" aria-controls="auth" aria-selected="true"
                >Вход
                </button>
            </li>
        </ul>

        <div class="tab-content" id="modalsTabContent">
            <div class="tab-pane fade show active" id="auth" role="tabpanel" aria-labelledby="auth_tab">
                <form action="php/auth_user.php" method="post">
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<p class="text-center text-success">' . $_SESSION['success'] . '</p>';
                    }
                    unset($_SESSION['success']);
                    ?>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="text-center text-danger">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
                    <div class="d-flex justify-content-center modal-inputs col-12">
                        <div class="col-lg-8 col-12">
                            <div class="form-floating mb-2">
                                <input class="form-control" type="text" name="login" id="login" maxlength="45"
                                       placeholder="Логин" required>
                                <label for="login">Логин <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-floating password">
                                <input class="form-control pass-input" type="password" name="pass" id="pass"
                                       maxlength="45" placeholder="Пароль" required>
                                <label for="pass">Пароль <span class="text-danger">*</span></label>
                                <a href="#" class="pass-control"><i
                                            class="text-secondary pass-icon fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-action">
                        <button type="submit" class="btn btn-blue">Войти</button>
                    </div>
                </form>
                <p class="text-center">Еще не зарегистрированы? <a href="index.php" class="link-primary">Зарегистрироваться</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script src="partial/js/bootstrap.bundle.min.js"></script>
<script src="partial/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script>
    $('.pass-control').on('click', function () {
        if ($('.pass-input').attr('type') == 'password') {
            $('.pass-icon').removeClass('fa-eye').addClass('fa-eye-slash')
            $('.pass-input').attr('type', 'text');
        } else {
            $('.pass-icon').addClass('fa-eye').removeClass('fa-eye-slash')
            $('.pass-input').attr('type', 'password');
        }
        return false;
    });
</script>
</body>
</html>
