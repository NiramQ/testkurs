<? include "../scripts/tobase2.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?
$zapros1 = "SELECT idw, idt FROM WT";
$zapros2 = "SELECT citya, cityb, money, nomer FROM WAYS";
$ZaprosCitya = "SELECT DISTINCT citya FROM WAYS";
$ZaprosCityb = "SELECT DISTINCT cityb FROM WAYS";

$result = mysql_query($zapros1);
$result2 = mysql_query($zapros2);
$result3 = mysql_query($ZaprosCitya);
$result4 = mysql_query($ZaprosCityb);

if (!$result) {
    echo "Could not successfully run query ($zapros1) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row = mysql_fetch_assoc($result)) {
    echo $row["idw"] . "-";
    echo $row["idt"] . ",";
}
?> </br><?
if (!$result2) {
    echo "Could not successfully run query ($zapros2) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result2) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row2 = mysql_fetch_assoc($result2)) {
    echo $row2["citya"] . "-";
    echo $row2["cityb"] . "<br>";
    echo $row2["money"] . "&nbsp руб.<br>№ &nbsp";
    echo $row2["nomer"] . "<br>";
    echo "_______<br>";
}
if (!$result3) {
    echo "Could not successfully run query ($ZaprosCitya) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result3) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
echo "<form method='post' action='test2.php'>";
echo "<select  name='picka'>";
while ($row = mysql_fetch_assoc($result3)) {
    echo "<option value=" . $row["citya"] . ">" . $row["citya"] . "</option>";
};
echo "</select>";

if (mysql_num_rows($result4) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
echo "<select name='pickb'>";
while ($row = mysql_fetch_assoc($result4)) {
    echo "<option >" . $row["cityb"] . "</option>";
};
echo "</select>";

echo "<input type='submit' name='search' value='send'>
</form>";
$zapros4 = "SELECT * FROM WAYS WHERE citya='" . $_POST['picka'] . "' AND cityb='" . $_POST['pickb'] . "'"; //выборка городов "из", "в"
$zaprosid = "SELECT * FROM (WAYS,TIMES,WT) WHERE (citya='" . $_POST['picka'] . "' AND cityb='" . $_POST['pickb'] . "' AND WAYS.id = WT.idw AND TIMES.id = WT.idt)";
$result5 = mysql_query($zapros4);
$result6 = mysql_query($zaprosid);
if (isset($_POST['search']))
    if (!$result5) {
        echo "Could not successfully run query ($zapros4) from DB: " . mysql_error();
        exit;
    }

if (mysql_num_rows($result5) == 0) {
    "<br>";
    echo "маршрут &nbsp" . $_POST['picka'] . "-" . $_POST['pickb'] . "&nbsp отсутствует";
    exit;
} else echo $_POST['picka'] . "-" . $_POST['pickb'] . "<br>";

$row = mysql_fetch_assoc($result5);
echo $row["money"] . "&nbsp руб.,";
echo "&nbsp № &nbsp" . $row["nomer"]."<br>";
if (!$result6) {
    echo "Could not successfully run query ($zaprosid) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result6) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row = mysql_fetch_assoc($result6)) {
    $date = date_create($row["time"]);
    echo date_format($date, 'H:i').", &nbsp";
}


?>


</body>
</html>