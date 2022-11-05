<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                <tr>
                    <td><?= $item['name']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['qty']?></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td>Итого</td>
                    <td><?= $_SESSION['cart.sum']?></td>
                    <td id="modal-cart-qty"><?= $_SESSION['cart.qty']?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <div class="card">
            <p>В корзине пусто</p>
            <a href="catalog.php" class="btn btn-success">Перейти к покупкам</a>
        </div>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
    <?php if (!empty($_SESSION['cart'])): ?>
        <button type="button" class="btn btn-success">Оформить заказ</button>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить коризну</button>
    <?php endif; ?>
</div>
