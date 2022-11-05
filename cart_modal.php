<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])): ?>
        <p>В корзине: <span id="modal-cart-qty" hidden><?= $_SESSION['cart.qty']?></span><?php echo num_word($_SESSION['cart.qty'], array('товар', 'товара', 'товаров'))?></p>
        <p>Сумма заказа: <?= $_SESSION['cart.sum']?>р.</p>

        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="partial/img/<?= $item['img']?>" class="img-fluid rounded-start" alt="<?= $item['name']?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['name']?></h5>
                        <p class="card-text"><?= $item['description']?></p>
                        <p class="card-text">Количество: <?= $item['qty']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
    <?php if (!empty($_SESSION['cart'])): ?>
        <a class="btn btn-success" href="page-cart.php?id=<?= $_SESSION['user']['id']?>">Перейти в корзину</a>
    <?php endif; ?>
</div>
