<?php

//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id_genre = $_GET[id_genre];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `Genres` WHERE `Genres`.`id_genre` = $id_genre");

/*
 * Переадресация на главную страницу
 */

header('Location: /');