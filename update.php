<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $id_book = $_GET[id_book];

    /*
     * Делаем выборку строки с полученным ID выше
     */
    $authors = mysqli_query($connect, "SELECT * FROM `Authors`");

    $genres = mysqli_query($connect, "SELECT * FROM `Genres`");

    $book = mysqli_query($connect, "SELECT * FROM `Books` WHERE `id_book` = '$id_book'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $book = mysqli_fetch_assoc($book);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
</head>
<body>
    <h3>Update Book</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id_book" value="<?= $book[id_book] ?>">
        <p>Name</p>
        <input type="text" name="name" value="<?= $book[name] ?>">
        <p>Description</p>
        <textarea name="description"><?= $book[description] ?></textarea>
        <p>Year</p>
        <input type="number" name="year" value="<?= $book[year] ?>">
        <br><br>
        <select name="aurhor_id" > 
                <?php foreach($authors as $author){ print_r($author) ?>
                    <option value="<?php echo $author[id_author];?>"><?php echo $author[FIO]; ?></option> 
                <?php } ?>
            </select><div class="w-100"></div><div class="w-100"></div><br>
            <select name="genre_id" > 
                <?php foreach($genres as $genre){ print_r($genre) ?>
                    <option value="<?php echo $genre[id_genre];?>"><?php echo $genre[name]; ?></option> 
                <?php } ?>
            </select>


         <br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>