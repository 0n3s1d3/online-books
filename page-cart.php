<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /online-books');
} include 'php/header.php' ;
?>
<div class="container mt-5">
    <?php if (!empty($_SESSION['cart'])): ?>
    <div class="row justify-content-between">
        <div class="col-7">
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <div class="card mb-3 col-12">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="partial/img/<?= $item['img']?>" class="img-fluid rounded-start" alt="<?= $item['name']?>">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?= $item['name']?></h5>
                                <p class="card-text text-muted"><?= $item['description']?></p>
                                <p class="card-text">Количество: <?= $item['qty']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="card col-4" style="height: fit-content">
            <div class="card-body">
                <p id="modal-cart-qty">В корзине: <?php echo num_word($_SESSION['cart.qty'], array('товар', 'товара', 'товаров'))?></p>
                <p>Сумма заказа: <?= $_SESSION['cart.sum']?>р.</p>
                <div class="btn-group-vertical w-100">
                    <button type="button" class="btn btn-success mb-3">Оформить заказ</button>
                    <button type="button" class="btn btn-danger" id="clear-cart">Очистить коризну</button>
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
<?php include 'php/footer.php' ?>
