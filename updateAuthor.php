<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $id_author = $_GET[id_author];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $author = mysqli_query($connect, "SELECT * FROM `Authors` WHERE `id_author` = '$id_author'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $author = mysqli_fetch_assoc($author);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Author</title>
</head>
<body>
    <h3>Update Author</h3>
    <form action="vendor/updateAuthor.php" method="post">
        <input type="hidden" name="id_author" value="<?= $author[id_author] ?>">
            <p>FIO</p>
            <input type="text" name="FIO">
            <p>date_birth</p>
            <input type="date" name="date_birth">
            <p>date_death</p>
            <input type="date" name="date_death"><br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>