<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id_genre = $_POST[id_genre];
$name = $_POST[name];
$description = $_POST[description];

// print_r($_POST);

/*
 * Делаем запрос на добавление новой строки в таблицу books
 */

mysqli_query($connect, "UPDATE `Genres` SET `name` = '$name', `description` = '$description' WHERE `Genres`.`id_genre` = '$id_genre'");

/*
 * Переадресация на главную страницу
 */

header('Location: /');
// header('Location: /library2/');
// header('Location: /', true, 303);