<html>
<head>
 <title>База данных Student. Таблица injections</title>
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
$SQL_query = "SELECT * FROM autors";
// Выполняем запрос (в переменную $res записывается результат) //
$res = $link->query($SQL_query);
?>

<table border="1">
    <caption>Таблица autors</caption>
    <tr>
        <th>id</th>
        <th>autorName</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($res)) {
 // элементы массива $row имеют индексы, совпадающие с названиями
//столюцов в таблице. Пользуясь ими, заполняем содержимое таблицы //
 echo "<tr> <td>" . $row['id'] . "</td> <td>" . $row['autorName'] . "</td></tr>";
 }
?>
</table>
<ul>
    <li>id</li>
    <li>||||</li>
    <li>autorName</li>

</ul>
<?php
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
        echo "<ul ><li > $row[id]</li ><li >||||</li ><li > $row[autorName]</li ></ul >";
}
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "автора с id = $row[id] зовут $row[autorName]<br>";
}
$link->close();
?>

</body>
</html>
