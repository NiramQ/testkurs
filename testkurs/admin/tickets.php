<?php include "../scripts/tobase.php"; ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Автовокзал</title>
    <link href="../css/mycss.css" rel="stylesheet">
</head>
<body>

<div id="header">
    <div id="menu">
        <br>
        <ul class="hr">
            <li><a href="buses.php">Автобусы</a></li>
            <li><a href="ways.php">Пути</a></li>
            <li class="current"><span>Время</span></li>
            <li><a href="#">Билеты</a></li>
            <li><a href="#">Пользователи</a></li>
            <li><a href="#">Гостевая книга</a></li>
        </ul>
    </div>
</div>

<div id="content">
    <div id="ways">
        Firefox and IE not supported!
        <br/>
        <form action="times.php" method="post">
            <label>Время: </label><input type="time" name="waytime"/>
            <input type="submit" value="add"/>
        </form>
    </div>
</div>

<div id="footer">
    <div class="copyright">
        <p><strong>Учебный сайт «Автовокзал»</strong></p>
        <p>&copy; Маринкин Андрей Владимирович ИВТ11в</p>
    </div>
</div>

</body>
</html>