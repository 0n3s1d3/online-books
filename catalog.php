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
    <title>Каталог</title>
</head>
<?php include 'php/header.php' ?>
<main class="main">
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php if(!empty($books)):?>
                <?php foreach ($books as $book): ?>
                    <div class="book-item col-lg-4 col-12 mb-3">
                        <div class="card">
                            <div class="card-img">
                                <img class="card-img-top p-3" src="partial/img/<?= $book['img']?>" alt="<?= $book['name']?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $book['name']?></h5>
                                <p class="card-text text-muted"><small><?= $book['author_fio']?></small></p>
                                <div class="card-group">
                                    <p class="card-text m-0"><?= $book['price']?>р.</p>
                                    <div class="btn-group">
                                        <a class="btn btn-primary me-2 add-to-cart" href="?cart=add$id=<?= $book['id']?>" data-id="<?= $book['id']?>"><i class="fa-solid fa-cart-shopping me-2"></i>Купить</a>
                                        <a class="btn btn-secondary" href="php/template.php"><i class="fa-solid fa-angle-right p-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php include 'php/footer.php' ?>