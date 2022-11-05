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
        <p>Привет, <?= $_SESSION['user']['login']?></p>
    </div>
</div>
<?php include 'php/footer.php'?>



