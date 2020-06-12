<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Таблица новостей</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <?php
            $host = '';  // Хост, у нас все локально
            $user = '';    // Имя созданного вами пользователя
            $pass = ''; // Установленный вами пароль пользователю
            $db_name = '';   // Имя базы данных
            $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
            
            // Ругаемся, если соединение установить не удалось
            if (!$link) {
                echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
                exit;
            }
        ?>
            
        <table border='1'>
            <tr>
                <td>ID</td>
                <td>Заголовок</td>
                <td>Статья</td>
                <td>Дата</td>
            </tr>
            <?php
                $sql = mysqli_query($link, 'SELECT `ID`, `title`,  `text`, `date` FROM `news`');
                while ($result = mysqli_fetch_array($sql)) {
                echo "<tr><td>{$result['ID']}</td><td>{$result['title']}</td><td>{$result['text']}</td><td>{$result['date']}</td></tr>";
            }
            ?>
        </table>
    </body>
</html>