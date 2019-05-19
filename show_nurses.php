<html>
<head>
    <title>База данных Student. Таблица nurses</title>
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
$SQL_query = "SELECT * FROM readers";
// Выполняем запрос (в переменную $res записывается результат) //
$res = $link->query($SQL_query);
?>

<table border="1">
    <caption>Таблица readers</caption>
    <tr>
        <th>id</th>
        <th>readerName</th>
        <th>readerAddress</th>
        <th>readerPhone</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($res)) {
        // элементы массива $row имеют индексы, совпадающие с названиями
//столюцов в таблице. Пользуясь ими, заполняем содержимое таблицы //
        echo "<tr> <td>" . $row['id']."</td><td>" . $row['readerName']."</td><td>" . $row['readerAddress']."</td><td>" . $row['readerPhone']."</td></tr>";
    }
    ?>
</table>
<ul>
    <li>id</li>
    <li>||||</li>
    <li>readerName</li>
    <li>||||</li>
    <li>readerAddress</li>
    <li>||||</li>
    <li>readerPhone</li>
</ul>
<?php
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "<ul ><li > $row[id]</li ><li > $row[readerName]</li ><li > $row[readerAddress]</li ><li > $row[readerPhone]</li ></ul>";
}
$res = $link->query($SQL_query);
while($row = mysqli_fetch_array($res)) {
    echo "читатель $row[readerName] живет по адресу $row[readerAddress] и имеет телефон: $row[readerPhone]<br>";
}
$link->close();
?>

</body>
</html>
