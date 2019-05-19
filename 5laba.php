<?php
$link=mysqli_connect("localhost", "root", "", 'library') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
?>
<form method="post">
<fieldset>
    <label for="bookId">книга:</label><br>
    <select name="bookId" value="<?=@$bookId;?>">
        <?php
        // Создаем выпадающий список, заполненный данными из другой таблицы
        $sql = "SELECT bookName FROM books";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option value = "<?=@$row['bookName']?>" <?php if(@$bookId==@$row['bookName'])
            {print "selected";}?> ><?=@$row['bookName']?> </option>
            <?php
        }
        ?>
    </select><br>

    <label for="date">Дата выдачи:</label><br>

    <input type="date" name="receiptDate" size="30" value="<?=@$receiptDate;?>"><br>

    <label for="date">Дата сдачи:</label><br>

    <input type="date" name="deliveryDate" size="30" value="<?=@$deliveryDate;?>"><br>

    <label for="readerId">читатель:</label><br>
    <select name="readerId" value="<?=@$readerId;?>">
        <?php
        // Создаем выпадающий список, заполненный данными из другой таблицы
        $sql = "SELECT readerName FROM readers";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option value = "<?=@$row['readerName']?>" <?php if(@$readerId==@$row['readerName'])
            {print "selected";}?> ><?=@$row['readerName']?> </option>
            <?php
        }
        ?>
    </select>
</fieldset>
    <input id="submit" type="submit" value="Вывод запроса"><br/>
</form>
<?php
@$bookId = $_POST["bookId"];
@$receiptDate = $_POST["receiptDate"];
@$deliveryDate = trim($_POST["deliveryDate"]);
@$readerId = trim($_POST["readerId"]);

$SQL_query = "SELECT * FROM gettingBooks WHERE bookId IN (SELECT id from books where bookName = '$bookId') AND receiptDate >= '$receiptDate' AND deliveryDate >= '$deliveryDate' AND readerId IN (SELECT id from readers where readerName = '$readerId')";
$res = $link->query($SQL_query);
if(@$bookId = $_POST["bookId"] != null && @$receiptDate = $_POST["receiptDate"] != null && @$deliveryDate = trim($_POST["deliveryDate"]) != null && @$readerId = trim($_POST["readerId"]) != null)
{
    echo $SQL_query."<br>";
    if(mysqli_num_rows($res) > 0)
    {
        echo "<table border=1> <caption>Таблица gettingBooks</caption> <tr> <th>bookId</th> <th>receiptDate</th> <th>deliveryDate</th> <th>readerId</th> </tr>";
        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr> <td>" . $row['bookId'] . "</td> <td>" . $row['receiptDate'] . "</td> <td>"
                . $row['deliveryDate'] . "</td> <td>" . $row['readerId'] . "</td> </tr>";
        }
    }
    else
        echo "пустой запрос!";
}
    $link->close();
    ?>
</table>
