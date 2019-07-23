<?php
include "DBH.php";
$con_str = mysqli_connect($host, $user, $password, $database);
//$mmm = $_GET['mmm']; //marshrut
$mmm = "0_2_1||0_1_2||0_3_3||3_2_4||2_3_3||1_2_2||4_1_2";

$h = strlen($mmm);

$pieces = explode("||",$mmm);


$way = explode("_", $pieces[0]);


$ghg = array();
$help = array();
$help2 = array();
array_slice($ghg, 6); // 4 - razmer
$help = array_pad($help, 6, 0);
for ($i=0;$i<6;$i++){
    array_push($ghg, $help);
}

for ($i = 0 ;$i<sizeof($pieces);$i++){
    $way = explode("_", $pieces[$i]);
    $ghg[intval($way[0])][intval($way[2])] = intval($way[1]);
}

for ($i = 0 ; $i<sizeof($ghg);$i++){
    for ($j = 0 ; $j<sizeof($ghg);$j++) {

    }
}
$t = json_encode($ghg);
$sqli ="INSERT INTO edges (wayes) VALUES('$t')";
$result = mysqli_query($con_str, $sqli) or die("Ошибка " . mysqli_error($con_str));












































/**
$pies = explode("_",$t);
$arr1 = array($pies);
$json_str = json_encode($arr1);
echo $json_str;
 **/
