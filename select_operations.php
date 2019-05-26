<?php
$link=mysqli_connect("localhost", "root", "", 'bank') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
?>
<form method="post">
    <fieldset>
        <label>Дата открытия</label><br>
        <select name="account_open_data">
            <?php
            $sql = "SELECT DISTINCT account_open_data FROM operations";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option><?=@$row['account_open_data']?></option>
                <?php
            }
            ?>
        </select><br>
        <label>Номер счета</label><br>
        <select name="account_number">
            <?php
            $sql = "SELECT DISTINCT account_number FROM operations";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option><?=@$row['account_number']?></option>
                <?php
            }
            ?>
        </select><br>
    </fieldset>
    <input id="submit" type="submit" value="Вывод запроса"><br/>
</form>
<?php
@$account_open_data = trim($_POST["account_open_data"]);
@$account_number = trim($_POST["account_number"]);

$SQL_query = "SELECT * FROM operations WHERE account_open_data  = '$account_open_data' AND account_number  = $account_number";
$res = $link->query($SQL_query);
if(@$account_open_data != null && @$account_number != null)
{
    echo $SQL_query."<br>";
    if(mysqli_num_rows($res) > 0)
    {
        echo "<table border=1> <caption>Таблица operations</caption> <tr> <th>account_open_data</th> <th>account_number</th></tr>";
        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr> <td>" . $row['account_open_data'] . "</td>  <td>" . $row['account_number'] . "</td></tr>";
        }
    }
    else
        echo "пустой запрос!";
}
$link->close();
?>
</table>
