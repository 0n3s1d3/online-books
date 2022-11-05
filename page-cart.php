<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /online-books');
}

require_once 'modals/orders_form.php';
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
    <title>Корзина</title>
</head>
<?php include 'php/header.php' ?>
    <main class="main">
        <div class="container mt-5 mb-5">
            <?php if (!empty($_SESSION['cart'])): ?>
                <div class="row justify-content-between">
                    <div class="col-7">
                        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                            <div class="card mb-3 col-12">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="partial/img/<?= $item['img']?>" class="w-100 img-fluid rounded-start" alt="<?= $item['name']?>">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item['name']?></h5>
                                            <p class="card-text text-muted"><small><?= $item['description']?></small></p>
                                            <p class="card-text">Количество: <?= $item['qty']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="cart-info card col-4" style="height: fit-content">
                        <div class="card-body">
                            <p id="modal-cart-qty">В корзине: <?php echo num_word($_SESSION['cart.qty'], array('товар', 'товара', 'товаров'))?></p>
                            <p>Сумма заказа: <?= $_SESSION['cart.sum']?>р.</p>
                            <div class="btn-group-vertical w-100">
                                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#ordersModal">Оформить заказ</button>
                                <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="row justify-content-center">
                    <div class="card col-4">
                        <div class="card-body col-12 text-center">
                            <p>В корзине пусто</p>
                            <a href="catalog.php" class="btn btn-success">Перейти к покупкам</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php include 'php/footer.php' ?>
