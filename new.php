<html>
<head>
    <title>База данных bd</title>
</head>
<body bgcolor="#C2E0E4" leftmargin="10%" rightmargin="10%">
<b>
    <?php
     $mass=explode(',',$_POST['Name']);
    $counter=0;
    foreach ($mass as $value)
    {
        if ($_POST['BY'] % $value == 0)
        {
            echo $_POST['BY']." делится нацело на ".$value."<br>";
        }
        else
        {
            echo $_POST['BY']." не делится нацело на ".$value."<br>";
        }
    }
    ?>
</b>
</body>
</html>