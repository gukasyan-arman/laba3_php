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


// print_r($_POST);

/*
 * Делаем запрос на добавление новой строки в таблицу books
 */

mysqli_query($connect, "INSERT INTO `Genres` (`id_genre`,`name`, `description`) VALUES (NULL, '$name', '$description');");

/*
 * Переадресация на главную страницу
 */

header('Location: /');
// header('Location: /library2/');
// header('Location: /', true, 303);