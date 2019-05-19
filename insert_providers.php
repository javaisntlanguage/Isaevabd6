<html>
<head>
    <title>Внесение данных в таблицу books</title>
</head>
<body>
<?php
// это основной скрипт, который проверят заполненность полей и добавляет
//данные в БД//
// получаем данные из формы, если они уже были внесены//
@$bookName = trim($_POST["bookName"]);
@$publishingYear = trim($_POST["publishingYear"]);
@$bookCount = $_POST["bookCount"];
@$autorId = $_POST["autorId"];

// проверяем, начали ли мы заполнять форму. Если начали, но не заполнили
//поле с фамилией, то записываем в переменную $error сообщение об ошибке//
$error=null;
if (strlen($bookName) == "0" && strlen($publishingYear) == "0" && strlen($bookCount) == "0" &&
    strlen($autorId) == "0") $error = null;
// Соединяемся сервером БД //
$link=mysqli_connect("localhost", "root", "", 'library') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
// Выбираем БД //
// создаем переменную с запросом на вставку данных в БД
$insert_sql = "INSERT INTO books (bookName,autorId, publishingYear, bookCount) VALUES('$bookName', '$autorId', '$publishingYear', '$bookCount')";
// выполняем запрос, если поле Фамилия было заполнено. Обнуляем
//переменные
if ($error==null && $link->query($insert_sql)) {$bookName=null; $publishingYear=null;
    $bookCount=null; $autorId=null; $messageOK="Запись успешно добавлена";}
else if ($error!=null) {
    $messageERR = "Произошла ошибка при добавлении новой записи";
    echo mysqli_error($link);
}
?>
<form method="post">
    <fieldset>
        <label for="Gender">Название книги:</label><br>
        <input type="text" name="bookName" size="30" value="<?=@$bookName;?>"><br>
        <br>
        <label for="Gender">год издания:</label><br>
        <input type="text" name="publishingYear" size="30" value="<?=@$publishingYear;?>"><br>

        <label for="Gender">количество книг:</label><br>
        <select name="bookCount" value="<?=@$bookCount;?>">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            for ($i=1;$i<101;$i++)
            {
                echo "<option value =$i>$i</option>";
            }
            ?>
        </select><br>

        <label for="nurse_id">id автора:</label><br>
        <select name="autorId" value="<?=@$autorId;?>">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM autors";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option value = "<?=@$row['id']?>" <?php if(@$autorId==@$row['id'])
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