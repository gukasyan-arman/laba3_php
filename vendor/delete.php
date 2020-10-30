<?php

//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id_book = $_GET[id_book];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `Books` WHERE `Books`.`id_book` = '$id_book'");

/*
 * Переадресация на главную страницу
 */

header('Location: /');