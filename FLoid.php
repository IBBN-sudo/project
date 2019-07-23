    <?php
    //SELECT * FROM users WHERE fname='Gena';
//$versh = $_GET['versh']; //vershini
  $infinity = 999999;
  $versh = 4;

  $D = json_decode('[[999999, 4, 1, 3, 999999], [999999, 999999, 4, 999999, 999999], [999999, 999999, 999999, 3, 999999], [999999, 999999, 4, 999999, 999999], [999999, 2, 999999, 999999, 999999]]');
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
    echo $D[4][2];

?>
