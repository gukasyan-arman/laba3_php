<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$FIO = $_POST[FIO];
$date_birth = $_POST[date_birth];
$date_death = $_POST[date_death];


// print_r($_POST);

/*
 * Делаем запрос на добавление новой строки в таблицу books
 */

mysqli_query($connect, "INSERT INTO `Authors` (`id_author`, `FIO`, `date_birth`, `date_death`) VALUES (NULL, '$FIO', '$date_birth', '$date_death');");

/*
 * Переадресация на главную страницу
 */

header('Location: /');
// header('Location: /library2/');
// header('Location: /', true, 303);