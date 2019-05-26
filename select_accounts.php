<?php
$link=mysqli_connect("localhost", "root", "", 'bank') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
?>
<form method="post">
    <fieldset>
        <label>Номер счета</label><br>
        <select name="client_id">
            <?php
            $sql = "SELECT DISTINCT client_id FROM accounts";
            $gr_id = $link->query($sql);
            while($row = mysqli_fetch_array($gr_id)){
                ?>
                <option><?=@$row['client_id']?></option>
                <?php
            }
            ?>
        </select><br>
    </fieldset>
    <input id="submit" type="submit" value="Вывод запроса"><br/>
</form>
<?php
@$client_id = trim($_POST["client_id"]);

$SQL_query = "SELECT * FROM accounts WHERE client_id  = $client_id";
$res = $link->query($SQL_query);
if(@$client_id != null)
{
    echo $SQL_query."<br>";
    if(mysqli_num_rows($res) > 0)
    {
        echo "<table border=1> <caption>Таблица accounts</caption> <tr> <th>client_id</th></tr>";
        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr> <td>" . $row['client_id'] . "</td></tr>";
        }
    }
    else
        echo "пустой запрос!";
}
$link->close();
?>
</table>
