<?php

//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id_author = $_GET[id_author];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `Authors` WHERE `Authors`.`id_author` = $id_author");

/*
 * Переадресация на главную страницу
 */

header('Location: /');