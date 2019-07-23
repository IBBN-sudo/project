<?php
include "DBH.php";
$con_str = mysqli_connect($host, $user, $password, $database);
$sqli ="SELECT * FROM edges ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con_str, $sqli) or die("Ошибка " . mysqli_error($con_str));
while ($row = $result->fetch_assoc()) {
    $gg= $row['wayes'];
}
$gg = json_decode($gg);
echo $gg[1][3];