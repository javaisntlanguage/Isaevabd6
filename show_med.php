<html>
<head>
    <title>База данных Student. Таблица medication</title>
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
$SQL_query = "SELECT * FROM books";
// Выполняем запрос (в переменную $res записывается результат) //
$res = $link->query($SQL_query);
?>

<table border="1">
    <caption>Таблица books</caption>
    <tr>
        <th>id</th>
        <th>bookName</th>
        <th>autorId</th>
        <th>publishingYear</th>
        <th>bookCount</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($res)) {
        // элементы массива $row имеют индексы, совпадающие с названиями
//столюцов в таблице. Пользуясь ими, заполняем содержимое таблицы //
        echo "<tr> <td>"
            . $row['id'] . "</td> <td>"
            . $row['bookName'] . "</td> <td>"
            . $row['autorId'] . "</td> <td>"
            . $row['publishingYear'] . "</td> <td>"
            . $row['bookCount'] . "</td> </tr>";
    }
    ?>
</table>
<ul>
    <li>id</li>
    <li>||||</li>
    <li>bookName</li>
    <li>||||</li>
    <li>autorId</li>
    <li>||||</li>
    <li>publishingYear</li>
    <li>||||</li>
    <li>bookCount</li>
    <li>||||</li>
</ul>
<?php
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "<ul ><li > $row[id]</li ><li >||||</li ><li >".$row['bookName']. "</li ><li >||||</li ><li > $row[autorId]</li ><li > $row[publishingYear]</li ><li > $row[bookCount]</li ></ul>";
}
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "книга $row[bookName] написанная автором с id $row[autorId] выпущена в". $row['publishingYear']." году. Имеется в наличии ".$row['bookCount']." штук<br>";
}
$link->close();
?>

</body>
</html>
