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


$result = mysql_query($zapros1);
$result2 = mysql_query($zapros2);
$result3 = mysql_query($ZaprosCitya);

if (!$result) {
    echo "Could not successfully run query ($zapros1) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row = mysql_fetch_assoc($result)) {
    echo $row["idw"]."-";
    echo $row["idt"].",";
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
    echo $row2["citya"]."-";
    echo $row2["cityb"]."<br>";
    echo $row2["money"]."<br>";
    echo $row2["nomer"]."<br>";
}
if (!$result3) {
    echo "Could not successfully run query ($ZaprosCitya) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($result3) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row = mysql_fetch_assoc($result3)) {
    echo $row["citya"]."</br>";
}
?>
?>


</body>
</html>