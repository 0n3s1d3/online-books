<?php if($_SERVER['REQUEST_URI'] !== '/online-books/profile.php?id='.$_SESSION['user']['id']): ?>
    <footer class="footer">
        <div class="container">
            <div class="contact">
                <div class="logo mb-3">
                    <a class="logo-link" href="catalog.php">
                        <img src="partial/img/logo.svg" alt="Логотип">
                    </a>
                </div>
                <ul class="contact-list list-reset">
                    <li class="contact-item text-light">Контакты</li>
                    <li class="contact-item text-light"><i class="fa-solid fa-location-dot me-2"></i>ТЦ "Семеновский, Семеновская пл. 1,<br>г. Москва, 105318</li>
                    <li class="contact-item"><a class="text-light" href="tel:+78004444444"><i class="fa-solid fa-phone me-2"></i>+7 (800) 444 44-44</a></li>
                    <li class="contact-item"><a class="text-light" href="mailto:online_book@gmail.com"><i class="fa-solid fa-envelope me-2"></i>online_book@gmail.com</a></li>
                </ul>
            </div>

        </div>
    </footer>
<?php endif; ?>
<script src="partial/js/bootstrap.bundle.min.js"></script>
<script src="partial/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="partial/js/main.js"></script>
<script>
    $(function() {
        $("#phone").mask("+7(999) 999-9999");
    });
</script>
</body>
</html>
