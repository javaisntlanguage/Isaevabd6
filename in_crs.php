<html>
<body bgcolor="#C2E0E4" leftmargin="10%" rightmargin="10%">
<?php
// Соединяемся сервером БД //
$link = mysqli_connect("localhost", "root", "", 'library') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
// заводим переменные для хранения данных, введенных в форме на предыдущей
//странице //
// обратите внимание на фукнцию trim - она удаляет лишние пробелы в строке ввода
//
$name = trim($_REQUEST['name']);
// заводим переменную, в которой будет записан запрос к БД на вставку данных из
//формы //
$insert_sql = "INSERT INTO autors (autorName)" . "VALUES('{$name}');";
// выполняем запрос. Если он прошел успешно, выводится одна фраза, если нет – то
//другая //
if ($link->query($insert_sql)) echo "<p>Новая запись успешно добавлена</p>";
else echo "<p>Произошла ошибка при добавлении новой записи</p>";;
?>
</body>
</html>