<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$name = $_POST[name];
$description = $_POST[description];
$year = $_POST[year];
$author_id = $_POST[aurhor_id];
$genre_id = $_POST[genre_id];


print_r($_POST);

/*
 * Делаем запрос на добавление новой строки в таблицу books
 */

mysqli_query($connect, "INSERT INTO `Books` (`name`, `description`, `year`, `author_id`, `genre_id`) VALUES ('$name', '$description', '$year', '$author_id', '$genre_id');");

/*
 * Переадресация на главную страницу
 */

// header('Location: /');
// header('Location: /library2/');
// header('Location: /', true, 303);