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
            <li class="current"><span>Автобусы</span></li>
            <li><a href="ways.php">Пути</a></li>
            <li><a href="times.php">Время</a></li>
            <li><a href="#">Билеты</a></li>
            <li><a href="#">Пользователи</a></li>
            <li><a href="#">Гостевая книга</a></li>
        </ul>
    </div>
</div>

<div id="content">
    <div id="bus">
        <br/>

        <form action="buses.php" method="post">
            <table class="table">
                <tr>
                    <th>Марка</th>
                    <th>Вместимость</th>
                </tr>
                <tr style="text-align: center">
                    <td><input type="text" name="busmarka" maxlength="15" style="width: 60px"></td>
                    <td><input type="text" name="busv" maxlength="3" style="width: 20px"></td>
                    <td><input name="submit"
                               value="add" class="button"
                               type="submit">  <?php if (isset($_POST['submit']) & ($_POST['busv']) != 0 & isset($_POST['busmarka']) != 0) {
                        $add = mysql_query("insert into BUSES (MARKA, MESTA) values ('" . $_POST['busmarka'] . "', '" . $_POST['busv'] . "')");
                        ?></td>
                    <td> <?php if ($add == true) {
                            echo "Запись добавлена";
                        } else {
                            echo "Запись не добавлена: " . mysql_error() . "";
                        }
                        } ?>
                    </td>
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


<div id="footer">
    <div class="copyright">
        <p><strong>Учебный сайт «Автовокзал»</strong></p>

        <p>&copy; Маринкин Андрей Владимирович ИВТ11в</p>
    </div>
</div>

</body>
</html>