<?php
    session_start();
    require_once "database/connect.php";

    if (!$_SESSION['user']) {
        header('Location: /online-books');
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
    <link rel="icon" type="image/ico" href="partial/img/logo.ico">
    <title>Профиль</title>
</head>
<?php include 'php/header.php' ?>
<main class="main">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-between">
            <div class="card col-lg-4 col-12 text-center mb-lg-0 mb-2">
                <div class="card-body">
                    <img src="partial/img/avatars/<?= $_SESSION['user']['avatar']?>" alt="Аватар">
                    <p><?= $_SESSION['user']['surname']?> <?= $_SESSION['user']['name']?> <?= $_SESSION['user']['patronymic']?></p>
                </div>
            </div>
            <div class="card col-lg-7 col-12">
                <div class="card-body">
                    <ul class="nav nav-border flex-nowrap">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#info">Информация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#orders">Заказы</a>
                        </li>
                    </ul>

                    <div class="tab-content pt-4">
                        <div class="tab-pane fade show active" id="info">
                            <form action="php/edit.php" method="POST">
                                <h5 class="mb-3 p-2 rounded d-flex bg-secondary text-white"><i class="fa-fw fa-solid fa-circle-user me-1"></i>Личная информация</h5>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Фамилия" name="surname" aria-label="surname" value="<?= $_SESSION['user']['surname']?>">
                                    <input type="text" class="form-control" placeholder="Имя" name="name" aria-label="name" value="<?= $_SESSION['user']['name']?>">
                                    <input type="text" class="form-control" placeholder="Отчество" name="patronymic" aria-label="patronymic" value="<?= $_SESSION['user']['patronymic']?>">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Улица</span>
                                    <input type="text" aria-label="Улица" class="form-control" name="address" value="<?= $_SESSION['user']['address']?>">
                                    <span class="input-group-text">г.</span>
                                    <input type="text" aria-label="Город" class="form-control" name="city_name" value="<?= $_SESSION['user']['city_name']?>">
                                </div>

                                <div class="row mb-3">
                                    <div class="input-group col-lg-6 col-12">
                                        <span class="input-group-text" id="tel"><i class="fa-solid fa-phone"></i></span>
                                        <input type="tel" class="form-control" id="phone" placeholder="Телефон" name="phone" aria-label="tel" aria-describedby="tel" value="<?= $_SESSION['user']['phone']?>">
                                    </div>

                                    <div class="input-group col-lg-6 col-12">
                                        <span class="input-group-text" id="mail"><i class="fa-solid fa-at"></i></span>
                                        <input type="email" class="form-control" placeholder="Почта" name="email" aria-label="mail" aria-describedby="mail" value="<?= $_SESSION['user']['email']?>">
                                    </div>
                                </div>
                                <?php
                                if (isset($_SESSION['success'])) {
                                    echo '<p class="text-center text-success">' . $_SESSION['success'] . '</p>';
                                }
                                unset($_SESSION['success']);
                                ?>
                                <?php
                                if (isset($_SESSION['error'])) {
                                    echo '<p class="text-center text-danger">' . $_SESSION['error'] . '</p>';
                                }
                                unset($_SESSION['error']);
                                ?>
                                <button class="btn btn-success float-end" type="submit">Сохранить</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="orders">В разработке <i class="fa-solid fa-gears"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'php/footer.php'?>



