<html>
<head>
    <style>
        .a{
            display: block;
        }

    </style>
    <title>База данных library</title>
</head>
<body bgcolor="#C2E0E4" leftmargin="10%" rightmargin="10%">
<h1>База данных library</h1>
<IMG src="library.jpg"
     align="right" width="25%">
<FONT SIZE="+1">
    В данной базе данных содержится информация о
    <a href="http://localhost/phpmyadmin/sql.php?server=1&db=library&table=gettingbooks&pos=0">библиотеке</a>. Имеется 4 таблицы:
    <UL>
        <LI><b>autors</b> - информация об авторах;</LI>
        <LI><b>books</b> - информация о книгах;</LI>
        <LI><b>readers</b> - информация о читателях;</LI>
        <LI><b>gettingBooks</b> - информация о выдачи книг.</LI>
    </UL>
-------------------------------------------------------------------------------------------------------------------------
   <form action = "new.php" method = "POST">
    <p>
        Введите числа через запятую: <input name="Name" type="text">
    <p>

        Выберите число:
        <select type="int" name="BY">
            <?php
            $y = 30;
            for ($i = 1; $i <= 100; $i++)
            {
                $next_y = $y + $i;
                echo '<option value='.$next_y.'>'.$next_y.'</option>';
            }
            ?>
        </select>
    <p>
        <input type="submit" value="Отправить">
</form>

    <form class="a" action="show_st.php">
        <input type="submit" value="Вывести таблицу autors">

    </form>

    <form action="show_med.php">
        <input type="submit" value="Вывести таблицу books">

    </form>

    <form action="show_nurses.php">
        <input type="submit" value="Вывести таблицу readers">

    </form>

    <form action="show_providers.php">
        <input type="submit" value="Вывести таблицу gettingBooks">

    </form>

    <form action="select.php">
        <input type="submit" value="Вывести книги, которые написал Пушкин">

    </form>

    <form action="insert_course.php">
        <input type="submit" value="ввести данные 3 лаба">

    </form>

    <form action="insert.php">
        <input type="submit" value="ввести данные 4 лаба gettingBooks">

    </form>

    <form action="insert_medication.php">
        <input type="submit" value="ввести данные 4 лаба readers">

    </form>

    <form action="insert_nurses.php">
        <input type="submit" value="ввести данные 4 лаба autors">

    </form>

    <form action="insert_providers.php">
        <input type="submit" value="ввести данные 4 лаба books">

    </form>

    <form action="5laba.php">
        <input type="submit" value="5 лаба">

    </form>

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
        <input type="submit" value="удалить gettingBooks">

    </form>

    <form class="a" action="deleten.php">
        <input type="submit" value="удалить autors">

    </form>

    <form class="a" action="deletep.php">
        <input type="submit" value="удалить readers">

    </form>
</body>
</html>
