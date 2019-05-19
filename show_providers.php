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
$SQL_query = "SELECT * FROM gettingBooks";
// Выполняем запрос (в переменную $res записывается результат) //
$res = $link->query($SQL_query);
?>

<table border="1">
    <caption>Таблица gettingBooks</caption>
    <tr>
        <th>id</th>
        <th>bookId</th>
        <th>receiptDate</th>
        <th>deliveryDate</th>
        <th>readerId</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($res)) {
        // элементы массива $row имеют индексы, совпадающие с названиями
//столюцов в таблице. Пользуясь ими, заполняем содержимое таблицы //
        echo "<tr> <td>" . $row['id']."</td><td>" . $row['bookId']."</td><td>" . $row['receiptDate']."</td><td>" . $row['deliveryDate']."</td><td>" . $row['readerId']."</td></tr>";
    }
    ?>
</table>
<ul>
    <li>id</li>
    <li>||||</li>
    <li>bookId</li>
    <li>||||</li>
    <li>receiptDate</li>
    <li>||||</li>
    <li>deliveryDate</li>
    <li>||||</li>
    <li>readerId</li>
</ul>
<?php
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "<ul ><li > $row[id]</li ><li > $row[bookId]</li ><li > $row[receiptDate]</li ><li > $row[deliveryDate]</li ><li > $row[readerId]</li ></ul>";
}
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "книга с id $row[bookId] была выдана читателю с id $row[readerId] $row[receiptDate] и должна быть возвращена до $row[deliveryDate]<br>";
}
$link->close();
?>

</body>
</html>
