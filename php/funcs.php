<?php
//Отладочная функция для распечатывания массивов в удобной форме
function debug(array $data): void {
    echo '<pre>'. print_r($data,1) .'</pre>';
}

function get_books(): array {
    global $pdo;
    $result = $pdo->query("SELECT * FROM `book` b 
                                    INNER JOIN `author` a on b.authorId = a.id 
                                    INNER JOIN `genre` g on b.genreId = g.id 
                                    INNER JOIN `publisher` p on b.publisherId = p.id
                                    ");
    return $result->fetchAll();
}