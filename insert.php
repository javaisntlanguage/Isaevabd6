<html>
<head>
    <title>Внесение данных в таблицу gettingBooks</title>
</head>
<body>
<?php
// это основной скрипт, который проверят заполненность полей и добавляет
//данные в БД//
// получаем данные из формы, если они уже были внесены//
    @$bookId = trim($_POST["bookId"]);
    @$receiptDate = trim($_POST["receiptDate"]);
    @$deliveryDate = $_POST["deliveryDate"];
    @$readerId = $_POST["readerId"];

// проверяем, начали ли мы заполнять форму. Если начали, но не заполнили
//поле с фамилией, то записываем в переменную $error сообщение об ошибке//
$error=null;
    if (strlen($bookId) == "0" && strlen($receiptDate) == "0" && strlen($deliveryDate) == "0" &&
        strlen($readerId) == "0") $error = null;
// Соединяемся сервером БД //
$link=mysqli_connect("localhost", "root", "", 'library') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
 // Выбираем БД //
// создаем переменную с запросом на вставку данных в БД
$insert_sql = "INSERT INTO gettingBooks (bookId, receiptDate, deliveryDate, readerId) VALUES('$bookId', '$receiptDate', '$deliveryDate', '$readerId')";
// выполняем запрос, если поле Фамилия было заполнено. Обнуляем
//переменные
if ($error==null && $link->query($insert_sql)) {$bookId=null; $receiptDate=null;
    $deliveryDate=null; $readerId=null; $messageOK="Запись успешно добавлена";}
else if ($error!=null) {
    $messageERR = "Произошла ошибка при добавлении новой записи";
    echo mysqli_error($link);
}
?>
<form method="post">
    <fieldset>
        <label for="medication_id">id книги:</label><br>
        <select name="bookId" value="<?=@$bookId;?>">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM books";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option value = "<?=@$row['id']?>" <?php if(@$bookId==@$row['id'])
                {print "selected";}?> ><?=@$row['id']?> </option>
                <?php
            }
            ?>
        </select>
        <br>
        <label for="Gender">Дата выдачи:</label><br>
        <input type="date" name="receiptDate" size="30" value="<?=@$receiptDate;?>"><br>

        <label for="Gender">Дата сдачи:</label><br>
        <input type="date" name="deliveryDate" size="30" value="<?=@$deliveryDate;?>"><br>

        <label for="nurse_id">id читателя:</label><br>
        <select name="readerId" value="<?=@$readerId;?>">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM readers";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option value = "<?=@$row['id']?>" <?php if(@$readerId==@$row['id'])
                {print "selected";}?> ><?=@$row['id']?> </option>
                <?php
            }
            ?>
        </select>
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