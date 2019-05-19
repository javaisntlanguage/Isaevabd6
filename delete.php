<html>
<head>
    <title>Внесение данных в таблицу Student</title>
</head>
<body>
<?php
// это основной скрипт, который проверят заполненность полей и добавляет
//данные в БД//
// получаем данные из формы, если они уже были внесены//
@$id = trim($_POST['id']);

// проверяем, начали ли мы заполнять форму. Если начали, но не заполнили
//поле с фамилией, то записываем в переменную $error сообщение об ошибке//
$error=null;
if (strlen($id) == "0") $error = null;
// Соединяемся сервером БД //
$link=mysqli_connect("localhost", "root", "", 'library') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
// Выбираем БД //
// создаем переменную с запросом на вставку данных в БД
$insert_sql = "DELETE FROM gettingBooks WHERE id = $id";
// выполняем запрос, если поле Фамилия было заполнено. Обнуляем
//переменные
if ($error==null && $link->query($insert_sql)) {$id=null; $messageOK="Запись успешно удалена";}
else if ($error!=null) {
    $messageERR = "Произошла ошибка при удалении записи";
    echo mysqli_error($link);
}
?>
<! теперь создаем форму для ввода данных. В форме используются php-вставки,
чтобы задавать начальные значения полей.
Это необходимо в том случае, если мы нажмем на кнопку и будет выведено
сообщение об ошибке. Если не сохранять уже введенные значения и не выводить их
в качестве начальных, то введенные данные будут потеряны.
Здесь же можно увидеть вывод переменной $error - если она пуста, то мы ничего не
увидим на странице, если же в нее было записано сообщение об ошибке, то оно
будет выведено.>
<form method="post">
    <fieldset>
        <label for="id">номер строки:</label><br>
        <select name="id" value="<?=@$id;?>">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM gettingBooks";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option value = "<?=@$row['id']?>" <?php if(@$id==@$row['id'])
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