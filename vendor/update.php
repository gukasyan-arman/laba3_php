<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id_book = $_POST[id_book];
$name = $_POST[name];
$description = $_POST[description];
$year = $_POST[year];
$author_id = $_POST[aurhor_id];
$genre_id = $_POST[genre_id];


// print_r($_POST);

/*
 * Делаем запрос на добавление новой строки в таблицу books
 */

mysqli_query($connect, "UPDATE `Books` SET `name` = '$name', `description` = '$description', `year` = '$year', `author_id` = '$author_id', `genre_id` = '$genre_id' WHERE `Books`.`id_book` = '$id_book'");

/*
 * Переадресация на главную страницу
 */

header('Location: /');
// header('Location: /library2/');
// header('Location: /', true, 303);