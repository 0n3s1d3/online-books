<?php
session_start();
require_once "database/connect.php";
if (!$_SESSION['user']) {
    header('Location: /online-books');
}
?>
<?php include 'php/header.php' ?>
<main class="main">
    <div class="container mt-5">
        <div class="row">
            <?php if(!empty($books)):?>
                <?php foreach ($books as $book): ?>
                    <div class="col-lg-3 col-12 mb-3">
                        <div class="card">
                            <div class="card-img">
                                <img class="card-img-top p-3" src="partial/img/<?= $book['img']?>" alt="<?= $book['name']?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $book['name']?></h5>
                                <p class="card-text"><?= $book['author_fio']?></p>
                                <div class="card-group">
                                    <p class="card-text m-0"><?= $book['price']?>р.</p>
                                    <div class="btn-group">
                                        <a class="btn btn-primary me-2 add-to-cart" href="?cart=add$id=<?= $book['id']?>" data-id="<?= $book['id']?>"><i class="fa-solid fa-cart-shopping me-2"></i>Купить</a>
                                        <a class="btn btn-primary" href="details_book.php$id=<?= $book['id']?>"><i class="fa-solid fa-angle-right p-1"></i></a>
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
