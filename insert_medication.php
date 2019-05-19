<html>
<head>
    <title>Внесение данных в таблицу readers</title>
</head>
<body>
<?php
// это основной скрипт, который проверят заполненность полей и добавляет
//данные в БД//
// получаем данные из формы, если они уже были внесены//
@$readerName = trim($_POST["readerName"]);
@$readerAddress = trim($_POST["readerAddress"]);
@$readerPhone = trim($_POST["readerPhone"]);

// проверяем, начали ли мы заполнять форму. Если начали, но не заполнили
//поле с фамилией, то записываем в переменную $error сообщение об ошибке//
$error=null;
if (strlen($readerName) == "0" && strlen($readerAddress) == "0" && strlen($readerPhone) == "0") $error = null;
// Соединяемся сервером БД //
if ($readerName && $readerAddress && $readerPhone)
{
    $link = mysqli_connect("localhost", "root", "", 'library') or die (mysqli_error());
    mysqli_set_charset($link, "utf8");
// Выбираем БД //
// создаем переменную с запросом на вставку данных в БД
    $insert_sql = "INSERT INTO readers (readerName, readerAddress, readerPhone) VALUES('$readerName', '$readerAddress', '$readerPhone');";
// выполняем запрос, если поле Фамилия было заполнено. Обнуляем
//переменные
    if ($error == null && $link->query($insert_sql)) {
        $readerName = null;
        $readerAddress = null;
        $readerPhone = null;
        $messageOK = "Запись успешно добавлена";
    } else if ($error != null) {
        $messageERR = "Произошла ошибка при добавлении новой записи";
        echo mysqli_error($link);
    }
}
?>
<form method="post">
    <fieldset>
        <label for="readerName">имя читателя:</label><br>
        <input type="text" name="readerName" size="30" value="<?=@$readerName;?>"><br>

        <label for="readerAddress">Адрес читателя:</label><br>
        <input type="text" name="readerAddress" size="30" value="<?=@$readerAddress;?>"><br>

        <label for="readerPhone">телефон читателя:</label><br>
        <input type="text" name="readerPhone" size="30" value="<?=@$readerPhone;?>"><br>

    </fieldset>
    <br/>
    <input id="submit" type="submit" value="Отправить данные"><br/>
</form>
<! Внизу страницы выводим сообщение о результате внесения данных >
<?=@$insert_sql;?>
<p><font color='green'><?=@$messageOK?></font><font color='red'> <?=@$messageERR?>
    </font></p>
</body>
</html>