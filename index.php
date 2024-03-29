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
                <button class="nav-link active" id="registration_tab"
                        data-bs-toggle="tab" data-bs-target="#registration"
                        type="button" role="tab" aria-controls="registration" aria-selected="true"
                >Регистрация
                </button>
            </li>
        </ul>

        <div class="tab-content" id="modalsTabContent">
            <div class="tab-pane fade show active" id="registration" role="tabpanel" aria-labelledby="registration_tab">
                <form action="php/create_user.php" method="post">
                    <div class="modal-inputs col-12">
                        <div class="row g-2 mb-2 col-lg-6 col-12">
                            <div class="col-12 form-floating">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Имя">
                                <label for="name">Имя</label>
                            </div>
                            <div class="col-12 form-floating">
                                <input class="form-control" type="text" name="surname" id="surname"
                                       placeholder="Фамилия">
                                <label for="surname">Фамилия</label>
                            </div>
                            <div class="col-12 form-floating">
                                <input class="form-control" type="text" name="patronymic" id="patronymic"
                                       placeholder="Отчество">
                                <label for="patronymic">Отчество</label>
                            </div>
                            <div class="col-12 form-floating">
                                <input class="form-control" type="tel" name="phone" id="phone" placeholder="Телефон">
                                <label for="phone">Телефон</label>
                            </div>
                            <div class="col-12 form-floating">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Почта">
                                <label for="email">Почта</label>
                            </div>

                            <div class="col-12 form-floating">
                                <input class="form-control" type="text" name="address" id="address" placeholder="Адрес">
                                <label for="address">Адрес</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-2 col-lg-6 col-12">
                            <div class="col-12 form-floating">
                                <input class="form-control" type="text" name="login" id="login_reg" maxlength="45"
                                       placeholder="Логин" required>
                                <label for="login_reg">Логин <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-12 form-floating password">
                                <input class="form-control pass-input" type="password" name="pass" id="pass_reg" maxlength="45"
                                       placeholder="Пароль" required>
                                <label for="pass_reg">Пароль <span class="text-danger">*</span></label>
                                <a href="#" class="pass-control"><i class="text-secondary pass-icon fa-solid fa-eye"></i></a>
                            </div>
                            <div class="col-12 form-floating password">
                                <input class="form-control pass-confirm-input" type="password" name="pass_confirm" id="pass_confirm"
                                       maxlength="45" placeholder="Повторите пароль" required>
                                <label for="pass_confirm">Повторите пароль <span class="text-danger">*</span></label>
                                <a href="#" class="pass-confirm-control"><i class="text-secondary pass-confirm-icon fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<p class="text-center text-danger">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
                    <div class="modal-action">
                        <button type="submit" class="btn btn-blue">Зарегистрироваться</button>
                    </div>
                </form>
                <p class="text-center">Уже зарегистрированы? <a href="login.php" class="link-primary">Войти</a></p>
            </div>
        </div>
    </div>
</div>

<script src="partial/js/bootstrap.bundle.min.js"></script>
<script src="partial/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js"
        type="text/javascript"></script>
<script>
    $(function () {
        $("#phone").mask("+7(999) 999-9999");

        $('.pass-confirm-control').on('click', function () {
            if ($('.pass-confirm-input').attr('type') == 'password') {
                $('.pass-confirm-icon').removeClass('fa-eye').addClass('fa-eye-slash')
                $('.pass-confirm-input').attr('type', 'text');
            } else {
                $('.pass-confirm-icon').addClass('fa-eye').removeClass('fa-eye-slash')
                $('.pass-confirm-input').attr('type', 'password');
            }
            return false;
        });

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
    });

</script>
</body>
</html>
