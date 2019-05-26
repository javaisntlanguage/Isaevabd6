<?php
$link=mysqli_connect("localhost", "root", "", 'bank') or die (mysqli_error ());
mysqli_set_charset($link, "utf8");
?>
<form method="post">
<fieldset>
    <label>ФИО</label><br>
    <select name="full_name">
        <?php
        $sql = "SELECT DISTINCT full_name FROM clients";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option><?=@$row['full_name']?></option>
            <?php
        }
        ?>
    </select><br>
    <label>Серия паспорта</label><br>
    <select name="passport_series">
        <?php
        $sql = "SELECT DISTINCT passport_series FROM clients";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option><?=@$row['passport_series']?></option>
            <?php
        }
        ?>
    </select><br>
    <label>Номер паспорта</label><br>
    <select name="passport_number">
        <?php
        $sql = "SELECT DISTINCT passport_number FROM clients";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option><?=@$row['passport_number']?></option>
            <?php
        }
        ?>
    </select><br>
    <label>адрес</label><br>
    <select name="address">
        <?php
        $sql = "SELECT DISTINCT address FROM clients";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option><?=@$row['address']?></option>
            <?php
        }
        ?>
    </select><br>
    <label>город</label><br>
    <select name="city_id">
        <?php
        $sql = "SELECT DISTINCT city_name FROM cities";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option><?=@$row['city_name']?></option>
            <?php
        }
        ?>
    </select><br>
    <label>пол</label><br>
    <select name="gender">
        <?php
        $sql = "SELECT DISTINCT gender FROM clients";
        $gr_id = $link->query($sql);
        while($row = mysqli_fetch_array($gr_id)){
            ?>
            <option><?=@$row['gender']?></option>
            <?php
        }
        ?>
    </select><br>
</fieldset>
    <input id="submit" type="submit" value="Вывод запроса"><br/>
</form>
<?php
@$full_name = trim($_POST["full_name"]);
@$passport_series = trim($_POST["passport_series"]);
@$passport_number = trim($_POST["passport_number"]);
@$address = trim($_POST["address"]);
@$city_id = trim($_POST["city_id"]);
@$gender = trim($_POST["gender"]);

$SQL_query = "SELECT * FROM clients WHERE full_name  = '$full_name' AND passport_series = $passport_series AND passport_number = $passport_number AND address = '$address'".
 "AND city_id IN(SELECT id FROM cities WHERE city_name = '$city_id') AND gender = '$gender'";
$res = $link->query($SQL_query);
if(@$full_name != null && @$passport_series != null && @$passport_number != null && @$address != null && @$city_id != null && @$gender != null)
{
    echo $SQL_query."<br>";
    if(mysqli_num_rows($res) > 0)
    {
        echo "<table border=1> <caption>Таблица clients</caption> <tr> <th>full_name</th> <th>passport_series</th> <th>passport_number</th> <th>address</th> <th>city_id</th> <th>gender</th> </tr>";
        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr> <td>" . $row['full_name'] . "</td> <td>" . $row['passport_series'] . "</td> <td>" . $row['passport_number'] . "</td> <td>"
                . $row['address'] . "</td> <td>" . $row['city_id'] . "</td> <td>" . $row['gender'] . "</td> </tr>";
        }
    }
    else
        echo "пустой запрос!";
}
    $link->close();
    ?>
</table>
