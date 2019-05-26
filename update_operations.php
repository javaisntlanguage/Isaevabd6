<html>
<head>
    <title>Внесение данных в таблицу clients</title>
</head>
<body>
<?php
// это основной скрипт, который проверят заполненность полей и добавляет
//данные в БД//
// получаем данные из формы, если они уже были внесены//
@$id = trim($_POST["id"]);
@$account_number = trim($_POST["account_number"]);
@$account_open_data = trim($_POST["account_open_data"]);
$error = null;
// Соединяемся сервером БД //
$link=mysqli_connect("localhost", "root", "", 'bank') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
// Выбираем БД //
// создаем переменную с запросом на вставку данных в БД
$insert_sql = "UPDATE operations  SET account_open_data = '$account_open_data',account_number= $account_number WHERE id = $id";
// выполняем запрос, если поле Фамилия было заполнено. Обнуляем
//переменные
if ($error==null && $link->query($insert_sql)) {$account_number=null; $account_open_data=null; $messageOK="Запись успешно добавлена";}
else if ($error!=null) {
    $messageERR = "Произошла ошибка при добавлении новой записи";
    echo mysqli_error($link);
}
?>
<form method="post">
    <fieldset>
        <label>номер строки:</label><br>
        <select name="id">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM operations";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option><?=@$row['id']?> </option>
                <?php
            }
            ?>
        </select><br>
        <label>номер счета:</label><br>
        <select name="account_number">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM accounts";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option><?=@$row['id']?> </option>
                <?php
            }
            ?>
        </select>
        <br>
        <label>Дата открытия:</label><br>
        <input type="date" name="account_open_data"><br>
    </fieldset>
    <br/>
    <input id="submit" type="submit" value="Отправить данные"><br/>
</form>
<?php echo $insert_sql; ?>
<! Внизу страницы выводим сообщение о результате внесения данных >
<p><font color='green'><?=@$messageOK?></font><font color='red'> <?=@$messageERR?>
    </font></p>
</body>
</html>