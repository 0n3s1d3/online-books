<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
if((isset($_POST['name'])&&$_POST['name']!="")&&(isset($_POST['phone'])&&$_POST['phone']!="")&&(isset($email)&&$email!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
    $to = 'qwertyulor@mail.ru'; //Почта получателя, через запятую можно указать еще адреса
    $subject = 'Заказ'; //Заголовок сообщения
    $message = '
                <html>
                    <head>
                        <title>'.$subject.'</title>
                    </head>
                    <body>
                        <p>Имя: '.$_POST['name'].'</p>
                        <p>Телефон: '.$_POST['phone'].'</p>     
                        <ul>
                            <li>'.$_SESSION['cart'].'</li>
                        </ul>                 
                    </body>
                </html>'; //Текст нащего сообщения можно использовать HTML теги
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
    $headers .= "From: Отправитель $email'\r\n"; //Наименование и почта отправителя
    mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
?>