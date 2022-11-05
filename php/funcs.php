<?php
//Отладочная функция для распечатывания массивов в удобной форме
function debug(array $data): void {
    echo '<pre>'. print_r($data,1) .'</pre>';
}

function get_books(): array {
    global $pdo;
    $result = $pdo->query("SELECT * FROM `book` b 
                                    INNER JOIN author a on b.authorId = a.author_id
                                    INNER JOIN genre g on b.genreId = g.genre_id
                                    INNER JOIN publisher p on b.publisherId = p.publisher_id
                                    ");
    return $result->fetchAll();
}

function get_book(int $id): array|false {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `book` WHERE id = ?");
    $stmt->execute([$id]);

    return $stmt->fetch();
}

function add_to_cart($book): void {
    if (isset($_SESSION['cart'][$book['id']])) {
        $_SESSION['cart'][$book['id']]['qty'] += 1;
    } else {
        $_SESSION['cart'][$book['id']] = [
            'name' => $book['name'],
            'price' => $book['price'],
            'description' => $book['description'],
            'img' => $book['img'],
            'qty' => 1,
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $book['price'] : $book['price'];
}