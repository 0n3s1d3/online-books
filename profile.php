<?php
    session_start();
    require_once "database/connect.php";
    if (!$_SESSION['user']) {
        header('Location: /online-books');
    }
?>
<?php include 'php/header.php' ?>
<div class="card">
    <div class="card-body">
        <?php if ($_SESSION['user']['surname'] != '' || $_SESSION['user']['name'] != '' || $_SESSION['user']['patronymic'] != ''): ?>
            <p>Привет, <?= $_SESSION['user']['surname']?> <?= $_SESSION['user']['name']?> <?= $_SESSION['user']['patronymic']?></p>
        <?php else: ?>
            <p>Привет, <?= $_SESSION['user']['login']?></p>
        <?php endif; ?>
    </div>

</div>
<?php include 'php/footer.php'?>



