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

        <form action="ways.php" method="post">
            <table class="table">
                <tr>
                    <th>Откуда</th>
                    <th>Куда</th>
                    <th>Стоимость, руб</th>
                    <th>Автобус</th>
                    <th>№</th>
                </tr>
                <tr style="text-align: center">
                    <td><input type="text" name="from" maxlength="20" style="width: 80px"></td>
                    <td><input type="text" name="where" maxlength="20" style="width: 80px"></td>
                    <td><input type="text" name="money" maxlength="20" style="width: 40px"></td>
                    <td><select name="selectbus[]"><?php $buszapros = mysql_query("select * from BUSES");
                            while ($data = mysql_fetch_array($buszapros)) {
                                ?>
                                <option><?php echo $data['MARKA'];
                                echo ' ';
                                echo $data['MESTA']; ?> </option><?
                            } ?></select></td>
                    <td><input type="text" name="nomer" maxlength="20" style="width: 30px"></td>
                    <td><input name="submit"
                               value="add" class="button"
                               type="submit"><?php if (isset($_POST['submit']) & ($_POST['from']) != 0 & isset($_POST['where']) != 0 & isset($_POST['money']) != 0 & isset($_POST['nomer']) != 0) {
                        $add = mysql_query('insert into WAYS (CITY_A, CITY_B, MONEY, VK_BUS, NOMER) values (' . $_POST['from'] . ', ' . $_POST['where'] . ', ' . $_POST['money'] . ', ' . $data['ID_WAY'] . ', ' . $_POST['nomer'] . ')');
                        ?></td>
                    <td> <?php if ($add == true) {
                            echo "Запись добавлена";
                        } else {
                            echo "Запись не добавлена: " . mysql_error() . "";
                        }
                        } ?>
                    </td>
                </tr>
                <tr style="text-align: center">
                    <td><input type="button"></td>
                    <td><input type="button"></td>
                    <td><input type="button"></td>
                    <td><input type="button"></td>
                    <td><input type="button"></td>
                    <td>Сортировка</td>
                </tr>
                <?php
                $waysszapros = mysql_query("select * from WAYS");
                while ($data = mysql_fetch_array($waysszapros)) {
                    ?>
                    <tr style="text-align: center">
                        <td><? echo $data['CITY_A']; ?></td>
                        <td><? echo $data['CITY_B']; ?></td>
                        <td><? echo $data['MONEY']; ?></td>
                        <td><? $ss = mysql_query('select MARKA, MESTA from BUSES where ID_BUS = ' . $data['VK_BUS'] . ''); echo $ss['MARKA'];?></td>
                        <td><? echo $data['NOMER']; ?></td>
                        <td><input type="button" value="del"></td>
                    </tr>
                <?php } ?>
            </table>
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