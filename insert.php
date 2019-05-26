<html>
<head>
    <title>Внесение данных в таблицу clients</title>
</head>
<body>
<?php
// это основной скрипт, который проверят заполненность полей и добавляет
//данные в БД//
// получаем данные из формы, если они уже были внесены//
    @$city_id = trim($_POST["city_id"]);
    @$full_name = trim($_POST["full_name"]);
    @$passport_series = trim($_POST["passport_series"]);
    @$passport_number = trim($_POST["passport_number"]);
    @$address = trim($_POST["address"]);
    @$gender = trim($_POST['gender']);

// проверяем, начали ли мы заполнять форму. Если начали, но не заполнили
//поле с фамилией, то записываем в переменную $error сообщение об ошибке//
$error=null;
    if (strlen($city_id) == "0" && strlen($full_name) == "0" && strlen($passport_series) == "0" &&
        strlen($address) == "0" && strlen($gender) == "0") $error = null;
// Соединяемся сервером БД //
$link=mysqli_connect("localhost", "root", "", 'bank') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
 // Выбираем БД //
// создаем переменную с запросом на вставку данных в БД
$insert_sql = "INSERT INTO clients (full_name, passport_series, passport_number, address , city_id, gender) VALUES('$full_name', $passport_series, $passport_number, '$address', $city_id, '$gender')";
// выполняем запрос, если поле Фамилия было заполнено. Обнуляем
//переменные
if ($error==null && $link->query($insert_sql)) {$city_id=null; $full_name=null;
    $passport_series=null; $address=null; $gender=null; $messageOK="Запись успешно добавлена";}
else if ($error!=null) {
    $messageERR = "Произошла ошибка при добавлении новой записи";
    echo mysqli_error($link);
}
?>
<form method="post">
    <fieldset>
        <label for="medication_id">id города:</label><br>
        <select name="city_id" value="<?=@$city_id;?>">
            <?php
            // Создаем выпадающий список, заполненный данными из другой таблицы
            $sql = "SELECT id FROM cities";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option value = "<?=@$row['id']?>" <?php if(@$city_id==@$row['id'])
                {print "selected";}?> ><?=@$row['id']?> </option>
                <?php
            }
            ?>
        </select>
        <br>
        <label>ФИО:</label><br>
        <input type="text" name="full_name" size="30" value="<?=@$full_name;?>"><br>

        <label>серия паспорта:</label><br>
        <input type="text" name="passport_series" size="30" value="<?=@$passport_series;?>"><br>

        <label>номер паспорта:</label><br>
        <input type="text" name="passport_number" size="30" value="<?=@$passport_number;?>"><br>

        <label>адрес:</label><br>
        <input type="text" name="address" size="30" value="<?=@$address;?>"><br>

        <label>пол:</label><br>
        <select name="gender">
                <option>G</option>
                <option>M</option>
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