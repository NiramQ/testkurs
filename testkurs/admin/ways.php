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
            <li class="current"><span>Пути</span></li>
            <li><a href="times.php">Время</a></li>
            <li><a href="#">Билеты</a></li>
            <li><a href="#">Пользователи</a></li>
            <li><a href="#">Гостевая книга</a></li>
        </ul>
    </div>
</div>

<div id="content">
    <div id="ways">
        <br/>
        <form action="buses.php" method="post">
            <table class="table">
                <tr>
                    <th>Откуда</th>
                    <th>Куда</th>
                    <th>Стоимость, руб.</th>
                    <th>Автобус</th>
                    <th>Номер</th>
                </tr>
                <tr style="text-align: center">
                    <td><input type="text" name="from" maxlength="20" style="width: 80px"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $buszapros = mysql_query("select * from BUSES");
                while ($data = mysql_fetch_array($buszapros)) {
                ?>
                <tr style="text-align: center">
                    <td><? echo $data['MARKA']; ?></td>
                    <td><? echo $data['MESTA']; ?></td>
                    <td>
                        <input type="submit" name="<? echo $data['ID_BUS'] ?>" value="delete!">
                        <?php
                        if (isset($_POST[$data['ID_BUS']])) {
                            $query = 'delete from BUSES where ID_BUS = ' . $data['ID_BUS'] . ' ';
                            mysql_query($query);
                        } ?>
                    </td>
                    <? }
                    ?>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
   if (isset($_POST['submit'])) $add = mysql_query("insert into TWays (waynum,citya,cityb,waymoney,waytime) values ('" . $_POST['waynumber'] ."', '" . $_POST['waya'] ."', '" . $_POST['wayb'] ."','" . $_POST['waymoney'] ."','" . $_POST['waytime'] ."' )")
?>





<div id="footer">
    <div class="copyright">
        <p><strong>Учебный сайт «Автовокзал»</strong></p>
        <p>&copy; Маринкин Андрей Владимирович ИВТ11в</p>
    </div>
</div>

</body>
</html>