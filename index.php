<html>
<head>
    <style>
        .a{
            display: block;
        }

    </style>
    <title>База данных bank</title>
</head>
<body bgcolor="#C2E0E4" leftmargin="10%" rightmargin="10%">
<h1>База данных library</h1>
<IMG src="bank.jpg"
     align="right" width="25%">
<FONT SIZE="+1">
    В данной базе данных содержится информация о
    <a href="http://localhost/phpmyadmin/sql.php?server=1&db=library&table=gettingbooks&pos=0">банке</a>.


    <form class="a" action="insert.php">
        <input type="submit" value="создать">

    </form>

    <form class="a" action="5laba.php">
        <input type="submit" value="прочитать">
    </form>

    <form class="a" action="update.php">
        <input type="submit" value="обновить">

    </form>

    <form class="a" action="delete.php">
        <input type="submit" value="удалить operations">

    </form>

    <form class="a" action="deleten.php">
        <input type="submit" value="удалить accounts">

    </form>

    <form class="a" action="deletep.php">
        <input type="submit" value="удалить clients">

    </form>
</body>
</html>
