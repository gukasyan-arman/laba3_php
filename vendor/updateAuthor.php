<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id_author = $_POST[id_author];
$FIO = $_POST[FIO];
$date_birth = $_POST[date_birth];
$date_death = $_POST[date_death];


// print_r($_POST);

/*
 * Делаем запрос на добавление новой строки в таблицу books
 */

mysqli_query($connect, "UPDATE `Authors` SET `FIO` = '$FIO', `date_birth` = '$date_birth', `date_death` = '$date_death' WHERE `Authors`.`id_author` = '$id_author'");

/*
 * Переадресация на главную страницу
 */

header('Location: /');
// header('Location: /library2/');
// header('Location: /', true, 303);