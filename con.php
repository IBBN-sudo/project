<?php
include 'DBH.php';
//include 'uou.php';



$con_str = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($con_str));
mysqli_select_db($con_str,'123');


/**
$sqli = "CREATE TABLE erew (
  id INT UNSIGNED NOT NULL,
  string JSON NOT NULL,
  PRIMARY KEY (id)
  
)";

$result = mysqli_query($con_str, $sqli) or die("Ошибка " . mysqli_error($con_str));
if($result)
{
    echo "Данные добавлены";
}
else {echo "daun";}
**/
$query ="INSERT INTO erew VALUES('1','$t')";
$result = mysqli_query($con_str, $query) or die("Ошибка " . mysqli_error($con_str));
if($result)
{
    echo "Данные добавлены";
}
mysqli_close($con_str);
