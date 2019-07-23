<?php
include "DBH.php";
$con_str = mysqli_connect($host, $user, $password, $database);
$mmm = $_GET['mmm']; //marshrut
$kkk = $_GET['kkk']; //razmer tabl
$ff = $_GET['ff'];
$tt = $_GET['tt'];

$h = strlen($mmm);

$pieces = explode("||",$mmm);

$way = explode("_", $pieces[0]);

$ghg = array();
$help = array();
$help2 = array();
array_slice($ghg, $kkk); // 4 - razmer
$help = array_pad($help, $kkk, 0);
for ($i=0;$i<$kkk;$i++){
    array_push($ghg, $help);
}

for ($i =0 ;$i<sizeof($pieces);$i++){
    $way = explode("_", $pieces[$i]);
    $ghg[intval($way[0])][intval($way[2])] = intval($way[1]);
}
for ($i = 0 ; $i<sizeof($ghg);$i++){
    for ($j = 0 ; $j<sizeof($ghg);$j++) {
        if ($ghg[$i][$j]==0){$ghg[$i][$j]=999999;}
    }
}
$t = json_encode($ghg);
$sqli ="INSERT INTO edges (wayes) VALUES('$t')";
$result = mysqli_query($con_str, $sqli) or die("Ошибка " . mysqli_error($con_str));


$sqli ="SELECT * FROM edges ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con_str, $sqli) or die("Ошибка " . mysqli_error($con_str));
while ($row = $result->fetch_assoc()) {
    $gg= $row['wayes'];
}


$infinity = 999999;

$D = json_decode($gg);
$size = sizeof($D);
for ($k = 0; $k < $size; $k++){
    for ($i = 0; $i < $size; $i++){
        for ($j = 0; $j < $size; $j++){
            if (($D[$i][$k]<>999999) and ($D[$k][$j]<>999999) and ($i<>$j)) {
                if (($D[$i][$k] + $D[$k][$j] < $D[$i][$j])) {
                    $D[$i][$j] = $D[$i][$k] + $D[$k][$j];
                }elseif (($D[$i][$k] + $D[$k][$j] > $D[$i][$j])){
                    $D[$i][$j] = $D[$i][$j];
                }
            }
        }
    }
}
echo $D[$ff][$tt];
