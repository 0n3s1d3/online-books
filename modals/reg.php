<?php require_once "database/connect.php";?>

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form action="php/save_user.php" method="post">
                    <input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль"><br>
                    <button class="btn btn-success">Зарегистрироваться</button><br>
                </form>
            </div>

        </div>
    </div>
</div>