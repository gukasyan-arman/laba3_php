<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $id_genre = $_GET[id_genre];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $genre = mysqli_query($connect, "SELECT * FROM `Genres` WHERE `id_genre` = '$id_genre'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $genre = mysqli_fetch_assoc($genre);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Genre</title>
</head>
<body>
    <h3>Update Genre</h3>
    <form action="vendor/updateGenre.php" method="post">
        <input type="hidden" name="id_genre" value="<?= $genre[id_genre] ?>">
           <p>name</p>
            <input type="text" name="name">
            <p>Description</p>
            <textarea name="description"></textarea><br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>