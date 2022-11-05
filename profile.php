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
        <div class="card">
            <div class="card-body">
                <p>Привет, <?= $_SESSION['user']['login']?></p>
            </div>
        </div>
    </div>
</main>

<?php include 'php/footer.php'?>



