<form id="send_order" method="POST" action="php/send.php" enctype="multipart/form-data">
    <div class="modal fade" id="ordersModal" tabindex="-1" aria-labelledby="ordersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordersModalLabel">Оформление заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 form-floating mb-1">
                        <input class="form-control" type="text" name="name" id="name" placeholder="Имя" value="<?= $_SESSION['user']['name'] ?>" required>
                        <label for="name">Имя</label>
                    </div>
                    <div class="col-12 form-floating mb-1">
                        <input class="form-control" type="tel" name="phone" id="phone" placeholder="Телефон" value="<?= $_SESSION['user']['phone'] ?>" required>
                        <label for="phone">Телефон</label>
                    </div>
                    <div class="col-12 form-floating mb-1">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Почта" value="<?= $_SESSION['user']['email'] ?>" required>
                        <label for="email">Почта</label>
                    </div>
                    <?php if (!empty($_SESSION['cart'])): ?>
                        <p id="modal-cart-qty">
                            Количество: <?php echo num_word($_SESSION['cart.qty'], array('товар', 'товара', 'товаров')) ?></p>
                        <p>Сумма заказа: <?= $_SESSION['cart.sum'] ?>р.</p>
                        <div class="col-12">
                            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                                <div class="card mb-3 col-12">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item['name'] ?></h5>
                                        <p class="card-text text-muted">
                                            <small><?= $item['description'] ?></small></p>
                                        <p class="card-text">Количество: <?= $item['qty'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-success" id="clear-cart">Заказать</button>
                </div>
            </div>
        </div>
    </div>
</form>