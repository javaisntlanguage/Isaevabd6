<html>
<head>
    <title>База данных Student. Таблица providers</title>
    <style>
        li{
            display: inline;
        }
    </style>
</head>
<body bgcolor="#C2E0E4" leftmargin="10%" rightmargin="10%">
<?php
// Соединяемся сервером БД //
$link = mysqli_connect("localhost", "root", "", "library") or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
// Выбираем БД //
// SQL-запрос //
$SQL_query = "SELECT bookName FROM books WHERE autorId = (SELECT id FROM autors WHERE autorName = 'Пушкин')";
// Выполняем запрос (в переменную $res записывается результат) //
?>
<table border="1">
    <caption>запрос</caption>
    <tr>
        <th>bookName</th>
    </tr>
    <?php
    $res = $link->query($SQL_query);
    while($row = mysqli_fetch_array($res)) {
        echo "<tr> <td>" . $row['bookName']."</td></tr>";
    }
    $link->close();
?>

</body>
</html>
