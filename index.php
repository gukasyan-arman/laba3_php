<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Books</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col"><button id="showBooks">Открыть таблицу 'Books'</button></div>
            <div class="col"><button id="hideBooks">Скрыть таблицу 'Books'</button></div>
            <div class="w-100"></div>
            <div class="col"><button id="showAuthors">Открыть таблицу 'Authors'</button></div>
            <div class="col"><button id="hideAuthors">Скрыть таблицу 'Authors'</button></div>
            <div class="w-100"></div>
            <div class="col"><button id="showGenres">Открыть таблицу 'Genres'</button></div>
            <div class="col"><button id="hideGenres">Скрыть таблицу 'Genres'</button></div>
        </div>
    </div>
    
    <div id="books" style="display: none;">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Year</th>
                <th>Author</th>
                <th>Genre</th>
            </tr>

            <?php

                /*
                 * Делаем выборку всех строк из таблицы "books"
                 */

                $authors = mysqli_query($connect, "SELECT * FROM `Authors`");

                $genres = mysqli_query($connect, "SELECT * FROM `Genres`");

                $books = mysqli_query($connect, "
                SELECT Books.id_book, Books.name, Books.description, Books.year, Authors.FIO, Genres.name
                FROM Books
                INNER JOIN Authors ON Books.author_id=Authors.id_author
                INNER JOIN Genres ON Genres.id_genre=Books.genre_id");


                /*
                 * Преобразовываем полученные данные в нормальный массив
                 */

                $books = mysqli_fetch_all($books);

                /*
                 * Перебираем массив и рендерим HTML с данными из массива
                 * Ключ 0 - id
                 * Ключ 1 - name
                 * Ключ 2 - description
                 * Ключ 3 - year
                 * Ключ 4 - id_author
                 * Ключ 5 - id_genre
                 */

                foreach ($books as $book) {
                    ?>
                        <tr>
                            <td><?= $book[0] ?></td>
                            <td><?= $book[1] ?></td>
                            <td><?= $book[2] ?></td>
                            <td><?= $book[3] ?></td>
                            <td><?= $book[4] ?></td>
                            <td><?= $book[5] ?></td>
                            <!-- <td><a href="book.php?id=<?= $book[0] ?>">View</a></td> -->
                            <td><a href="update.php?id_book=<?= $book[0] ?>">Update</a></td>
                            <td><a style="color: red;" href="vendor/delete.php?id_book=<?= $book[0] ?>">Delete</a></td>
                        </tr>
                    <?php
                }
            ?>
        </table>
        <h3>Add new book</h3>
        <form action="vendor/create.php" method="post">
            <p>Name</p>
            <input type="text" name="name">
            <p>Description</p>
            <textarea name="description"></textarea>
            <p>Year</p>
            <input type="number" name="year">
            <div class="w-100"></div>
            <br>
            <select name="aurhor_id" > 
                <?php foreach($authors as $author){ print_r($author) ?>
                    <option value="<?php echo $author[id_author];?>"><?php echo $author[FIO]; ?></option> 
                <?php } ?>
            </select><div class="w-100"></div><div class="w-100"></div>
            <select name="genre_id" > 
                <?php foreach($genres as $genre){ print_r($genre) ?>
                    <option value="<?php echo $genre[id_genre];?>"><?php echo $genre[name]; ?></option> 
                <?php } ?>
            </select>


             <br> <br>
            <button type="submit">Add new book</button>
        </form>
    </div>

    <div id="authors" style="display: none;">
        <table>
            <tr>
                <th>ID</th>
                <th>FIO</th>
                <th>date of birth</th>
                <th>date of death</th>
            </tr>

            <?php

                /*
                 * Делаем выборку всех строк из таблицы "books"
                 */

                $authors = mysqli_query($connect, "SELECT * FROM `Authors`");

                /*
                 * Преобразовываем полученные данные в нормальный массив
                 */

                $authors = mysqli_fetch_all($authors);

                /*
                 * Перебираем массив и рендерим HTML с данными из массива
                 * Ключ 0 - id
                 * Ключ 1 - FIO
                 * Ключ 2 - date_birth
                 * Ключ 3 - date_death
                 */

                foreach ($authors as $author) {
                    ?>
                        <tr>
                            <td><?= $author[0] ?></td>
                            <td><?= $author[1] ?></td>
                            <td><?= $author[2] ?></td>
                            <td><?= $author[3] ?></td>
                            <!-- <td><a href="book.php?id=<?= $book[0] ?>">View</a></td> -->
                            <td><a href="updateAuthor.php?id_author=<?= $author[0] ?>">Update</a></td>
                            <td><a style="color: red;" href="vendor/deleteAuthor.php?id_author=<?= $author[0] ?>">Delete</a></td>
                        </tr>
                    <?php
                }
            ?>
        </table>
        <h3>Add new author</h3>
        <form action="vendor/createAuthor.php" method="post">
            <p>FIO</p>
            <input type="text" name="FIO">
            <p>date_birth</p>
            <input type="date" name="date_birth">
            <p>date_death</p>
            <input type="date" name="date_death"><br> <br>
            <button type="submit">Add new author</button>
        </form>
    </div>

    <div id="genres" style="display: none;">
        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>descriprion</th>
            </tr>

            <?php

                /*
                 * Делаем выборку всех строк из таблицы "books"
                 */

                $genres = mysqli_query($connect, "SELECT * FROM `Genres`");

                /*
                 * Преобразовываем полученные данные в нормальный массив
                 */

                $genres = mysqli_fetch_all($genres);

                /*
                 * Перебираем массив и рендерим HTML с данными из массива
                 * Ключ 0 - id
                 * Ключ 1 - name
                 * Ключ 2 - description
                 */

                foreach ($genres as $genre) {
                    ?>
                        <tr>
                            <td><?= $genre[0] ?></td>
                            <td><?= $genre[1] ?></td>
                            <td><?= $genre[2] ?></td>
                            <!-- <td><a href="book.php?id=<?= $book[0] ?>">View</a></td> -->
                            <td><a href="updateGenre.php?id_genre=<?= $genre[0] ?>">Update</a></td>
                            <td><a style="color: red;" href="vendor/deleteGenre.php?id_genre=<?= $genre[0] ?>">Delete</a></td>
                        </tr>
                    <?php
                }
            ?>
        </table>
        <h3>Add new genre</h3>
        <form action="vendor/createGenre.php" method="post">
            <p>name</p>
            <input type="text" name="name">
            <p>Description</p>
            <textarea name="description"></textarea><br> <br>
            <button type="submit">Add new genre</button>
        </form>
    </div>

<script src="script.js"></script>       
</body>
</html>