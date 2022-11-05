<?php
session_start();
require_once "database/connect.php";
if (!$_SESSION['user']) {
    header('Location: /online-books');
}
?>
<?php include 'php/header.php' ?>
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
                                <p class="card-text m-0"><?= $_GET[$book['price']]?>р.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php include 'php/footer.php' ?>
